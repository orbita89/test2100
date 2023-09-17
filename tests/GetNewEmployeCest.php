<?php

declare(strict_types=1);

use Codeception\Util\HttpCode;
use Tests\Support\ApiTester;

class GetNewEmployeCest
{
	//Проверка GET-запроса для получения полных данных
    public function getEmployeById(ApiTester $apiTester): void
    {
        $apiTester->wantToTest('Get game by id');
        $s=$apiTester->sendGet('27');
        print_r($s);
        $apiTester->seeResponseCodeIs(HttpCode::OK);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseContainsJson(
            [
                "id" => 27,
                'name' => 'фыфыффыы',
                'email' => 'asdasd@mail.com',
                'position' => 'asdasd',
                'age' => 12
            ]
        );
    }
	//Проверка GET-запроса с несуществующим id сотрудника
    public function GetNonExistentEmployee(ApiTester $apiTester): void
    {
        $apiTester->wantToTest('Get non-existent employee');

        $apiTester->sendGet("-2");

        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);

        $apiTester->seeResponseIsJson();

    }



}

