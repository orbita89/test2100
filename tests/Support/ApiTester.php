<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

    /**
     * Define custom actions here
     */
    public function dontSeeResponseJsonMatchesJsonType(array $array)
    {
    }

    public function assertSame(string $string, string $gettype)
    {
    }

    public function assertNotEmpty(string $value, string $string)
    {
    }

    public function dontSeeException()
    {

    }

    public function seeResponseJsonMatchesType(array $array)
    {
    }

    public function assertEquals(mixed $response, array $actualArray)
    {
    }

    public function dontSeeResponseEqualsJson(array $actualArray)
    {
    }

    public function SeeResponseEqualsJson(array $actualArray)
    {
    }

    public function assertEqualsCanonicalizing(array $expectedArray, array $response)
    {

    }
}
