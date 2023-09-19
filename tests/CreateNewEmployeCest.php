<?php

declare(strict_types=1);

use Codeception\Example;
use Codeception\Util\HttpCode;
use Tests\Support\ApiTester;

class CreateNewEmployeCest
{
    public function createEmploye(ApiTester $apiTester): void
    {
        $apiTester->wantToTest('Create new Employe');

        $requestBody = [
            "name" => 'asasdas',
            "email" => "doasdoasd@gmail.com",
            "position" => 'asdasdasd',
            "age" => 12

        ];
        $apiTester->sendPostAsJson(
            'add',
            $requestBody
        );
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

//Проверка уникального поля "email"
    public function EmailFieldIsUnique(ApiTester $apiTester): void
    {
        $apiTester->wantTo('Test that the "email" field is unique');
        $apiTester->sendPostAsJson('/add', [
            "name" => '121212',
            "email" => "doasdoasd@gmail.com",
            "position" => '1212121',
            "age" => 'asdascasc',

        ]);
        $apiTester->sendPostAsJson('/add', [
            "name" => '1qwq21212',
            "email" => "doasdoasd@gmail.com",
            "position" => '12qw12121',
            "age" => 'qwqqw',
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


//Нечего лучшего не придумал как проверить отдельно каждое поле пробовал через foreach будет одна ошибка вся проверка останавливается
//И мы не узнаем код ответа у других полей! Можно отключить код ответа, что бы посмотреть все ответы и вместо --steps написать -vvv что бы видеть какой пришёл код ответа

    /** @dataProvider  incorrectDataProvider */
    public function createEmployeIncorrectData(ApiTester $apiTester, Example $provider): void
    {
        $apiTester->wantToTest('Create new game with incorrect data');

        $apiTester->sendPostAsJson('add', $provider['requestBody']);

        $apiTester->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    private function incorrectDataProvider(): iterable
    {
        //валидация email
        yield [
            'requestBody' => [
                'email' => '',
                'position' => 'zxzxzxz',
                'name' => 'zxzxz',
                'age' => 12
            ],
        ];
        [
            yield
            'requestBody' => [
                'email' => 12,
                'name' => 'zxzxzxz',
                'position' => 'zxzxzxz',
                'age' => 12,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => null,
                'name' => 'zxzxzxz',
                'position' => 'zxzxzxz',
                'age' => 12,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => true,
                'name' => 'zxzxzxz',
                'position' => 'zxzxzxz',
                'age' => 34,
            ],
        ];
        //валидация name
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => '',
                'position' => 'zxzxzxz',
                'age' => 12
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => null,
                'position' => 'zxzxzxz',
                'age' => 12,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 12,
                'position' => 'zxzxzxz',
                'age' => 12,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => true,
                'position' => 'zxzxzxz',
                'age' => 12,
            ],
        ];
        //валидация position
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => '',
                'age' => 12
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'jsadjajsd',
                'position' => 12,
                'age' => 12,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => null,
                'age' => 12,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => true,
                'age' => 12,
            ],
        ];
 //валидация age
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 12,
                'position' => 'zxzxzxz',
                'age' => '12',
            ],
        ];


        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => 12,
                'age' => null,
            ],
        ];
        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => 'zxzxzxz',
                'age' => 12.3333333333333,
            ],
        ];

        yield [
            'requestBody' => [
                'email' => 'asdsak@gmail.com',
                'name' => 'zxzxzxz',
                'position' => 'zxzxzxz',
                'age' => true,
            ],
        ];
    }

}
