<?php

declare(strict_types=1);

use Codeception\Example;
use PHPUnit\Framework\Attributes\Before;
use Codeception\Util\HttpCode;
use PHPUnit\Framework\Assert;
use Tests\Support\ApiTester;

class DeleteNewEmployeCest
{
    //Проверка на удаление сотрудника
    public function deleteEmployeById(ApiTester $apiTester): void
    {
        $apiTester->wantToTest('Delete Employe by id');

        $apiTester->sendDelete('remove/27');

        $apiTester->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $apiTester->sendGet('/27');

        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);
    }

//Проверка DELETE-запроса с несуществующим id сотрудника
    public function DeleteNonExistentEmployee(ApiTester $apiTester)
    {
        $apiTester->sendDELETE('remove/-1');

        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);

    }
}