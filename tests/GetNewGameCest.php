<?php

declare(strict_types=1);

use Codeception\Example;
use Codeception\Util\HttpCode;
use Tests\Support\ApiTester;

class GetNewGameCest
{
    public function createGame(ApiTester $apiTester): void
    {
        $apiTester->wantToTest('Create new game');

        $requestBody = [
            'name' => 12,
            'data' => [
                'year' => 0,
                'genre' => 'men',
                'price' => 'asas'
            ]
        ];

        $apiTester->sendPostAsJson('', $requestBody);

        $apiTester->seeResponseCodeIs(HttpCode::OK);

        $apiTester->seeResponseIsJson();

        $apiTester->seeResponseMatchesJsonType(
            [
                'id' => 'string',
                'name' => 'string',
                'data' => [
                    'year' => 'integer|null',
                    'genre' => 'string',
                    'price' => 'string:email'
                ]
            ]
        );
    }

    /** @dataProvider incorrectDataProvider */
    public function createGameWithIncorrectData(ApiTester $apiTester, Example $provider): void
    {
        $apiTester->wantToTest('Create new game with incorrect data');

        $apiTester->sendPostAsJson('', $provider['requestBody']);

        $apiTester->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    private function incorrectDataProvider(): iterable
    {
        yield [
            'requestBody' => [],
        ];

        yield [
            'requestBody' => '-1'
        ];
    }
}