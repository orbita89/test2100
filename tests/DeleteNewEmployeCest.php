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

        $apiTester->sendDelete('remove/27');

        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);
    }

//    /** @dataProvider incorrectDataProvider */
//    public function deleteGameWithIncorrectId(ApiTester $apiTester, Example $provider): void
//    {
//        $apiTester->wantToTest('Delete game by incorrect id');
//
//        $apiTester->sendDelete($provider['incorrectId']);
//
//        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);
//    }
//
//    private function incorrectDataProvider(): iterable
//    {
//        yield [
//            'incorrectId' => 'asd'
//        ];
//
//        yield [
//            'incorrectId' => '-1'
//        ];
//    }
}