<?php

declare(strict_types=1);

use Codeception\Example;
use Codeception\Util\HttpCode;
use Tests\Support\ApiTester;

class CreateNewEmployeCest
{
    public function createEmploye(ApiTester $apiTester): void
    {
        $apiTester->wantToTest('Create new game');

        $requestBody = [
            "name" => '121212',
            "email" => "doasdoasd@gmail.com",
            "position" => '1212121',
            "age" => 'asdascasc'

        ];
        $apiTester->sendPostAsJson(
            'add',
            $requestBody
        );
        $apiTester->seeResponseCodeIs(HttpCode::CREATED);
        $apiTester->seeResponseIsJson();

        $apiTester->seeResponseJsonMatchesType([
            'name' => 'string',
            'email' => 'string',
            'position' => 'string',
            'age' => 'integer'
        ]);
    }
//Проверка соответствия маске поля "email"
    public function InvalidEmailFormat(ApiTester $apiTester): void
    {
        $apiTester->wantTo('Test invalid email format');

        $apiTester->sendPostAsJson('/add', [
            'name' => 'John Doe',
            'email' => 'invalid_email_without_at_and_dot',
            'position' => 'Developer',
            'age' => 30
        ]);
        $apiTester->sendPostAsJson('/add', [
            'name' => 'John Doe',
            'email' => 'invalidemailwithout@atnddot',
            'position' => 'Developer',
            'age' => 30
        ]);
        $apiTester->sendPostAsJson('/add', [
            'name' => 'John Doe',
            'email' => 'invalidemailwithoutatnd.dot',
            'position' => 'Developer',
            'age' => 30
        ]);
        $apiTester->seeResponseCodeIs(400);
    }
//Проверка обязательного поля "email"
    public function EmailFieldIsRequired(ApiTester $apiTester): void
    {
        $apiTester->wantTo('Test that the "email" field is required');
        $apiTester->sendPostAsJson(
            '/add',
            [
                "name" => '121212',
                "position" => '1212121',
                "age" => 'asdascasc'
            ]
        );
        $apiTester->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }
//Проверка на заполнения поля "position" 'email' 'name' 'age'
    public function createEmployeWithIncorrectData(ApiTester $apiTester, Example $provider): void
    {
        $apiTester->wantToTest('Create new game with incorrect data');

        $apiTester->sendPostAsJson('add', $provider['requestBody']);

        $apiTester->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    private function incorrectDataProvider(): iterable
    {
        //проверяем email на пустое поле +
        yield [
            'requestBody' => [
                'email' => '',
                'position' => 'zxzxzxz',
                'name' => 'zxzxz',
                'age' => 12
            ],
        ];

        //проверяем name на пустое поле -
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => '',
                'position' => 'zxzxzxz',
                'age' => 12
            ],
        ];
        //проверяем position на пустое поле -
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => '',
                'age' => 12
            ],
        ];
        ////проверяем age на null поле -
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => 'zxzxzxz',
                'age' => null,
            ],
        ];
    }

}


