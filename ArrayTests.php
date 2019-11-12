<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.11.2019
 * Time: 23:42
 */

require 'UnusualArrayHelper.php';

class ArrayTests extends \PHPUnit\Framework\TestCase
{
    /** @var UnusualArrayHelper */
    private $arrayHelper;

    protected function setUp(): void
    {
        $this->arrayHelper = new UnusualArrayHelper();
    }

    protected function tearDown(): void
    {
        $this->arrayHelper = NULL;
    }

    /**
     * Тесты к первой задаче
     * Дан несортированный массив чисел. дана сумма какая то n.
     * нужно выяснить есть ли в массиве два числа которые в сумме дают n
     */
    public function testCheckSum()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 12, 32, 44, 2, 12];
        $result = $this->arrayHelper->checkSum($array, 5);
        $this->assertEquals(true, $result);
        $result = $this->arrayHelper->checkSum($array, 100);
        $this->assertEquals(false, $result);
        $result = $this->arrayHelper->checkSum($array, -1);
        $this->assertEquals(false, $result);
        $result = $this->arrayHelper->checkSum($array, 0);
        $this->assertEquals(false, $result);
        $result = $this->arrayHelper->checkSum($array, null);
        $this->assertEquals(false, $result);
        $array = [];
        $result = $this->arrayHelper->checkSum($array, 1);
        $this->assertEquals(false, $result);
        $array = [-1, -2, -3];
        $result = $this->arrayHelper->checkSum($array, 1);
        $this->assertEquals(false, $result);
        $result = $this->arrayHelper->checkSum($array, -3);
        $this->assertEquals(true, $result);
    }

    /*
     * Тесты ко второй задаче
     * Дан некий массив строк состоящих из строчных латинских символов, задача найти максимальный общий префикс среди всех строк.
     * Пример:
     * [ "qwe", "qweasd", "qwsdfsdf", "tr" ] -> ""
     * [ "qwe", "qweasd", "qwsdfsdf" ] -> "qw"
     * [ "qwe", "qeasd", "qwsdfsdf" ] -> "q"
     */
    public function testGetPrefix()
    {
        $array = ["qwe", "qweasd", "qwsdfsdf", "tr"];
        $result = $this->arrayHelper->getPrefix($array);
        $this->assertEquals('', $result);
        $array = ["qwe", "qweasd", "qwsdfsdf"];
        $result = $this->arrayHelper->getPrefix($array);
        $this->assertEquals("qw", $result);
        $array = ["qwe", "qeasd", "qwsdfsdf"];
        $result = $this->arrayHelper->getPrefix($array);
        $this->assertEquals("q", $result);
        $array = [];
        $result = $this->arrayHelper->getPrefix($array);
        $this->assertEquals("", $result);
        $array = [13, 12, 123];
        $result = $this->arrayHelper->getPrefix($array);
        $this->assertEquals("1", $result);
    }

    /**
     * Тесты к третьей задаче
     * Дан массив чисел. дано расстояние k. если числа в массиве находятся рядом то они на расстоянии 1 друг от друга.
     * нужно найти количество пар дублей, которые находятся на расстоянии k друг от друга
     */
    public function testGetDoubles()
    {
        $array = [1,2,3,4,5,6,7,8,1,2,4,4,5,2];
        $result = $this->arrayHelper->getDoubles($array, 8);
        $this->assertEquals(4, $result);
        $result = $this->arrayHelper->getDoubles($array, 10);
        $this->assertEquals(0, $result);
        $result = $this->arrayHelper->getDoubles($array, 12);
        $this->assertEquals(1, $result);
        $result = $this->arrayHelper->getDoubles($array, -8);
        $this->assertEquals(4, $result);
        $result = $this->arrayHelper->getDoubles($array, 0);
        $this->assertEquals(0, $result);
        $array = [];
        $result = $this->arrayHelper->getDoubles($array, 8);
        $this->assertEquals(0, $result);
        $array = [-1, -2, -1, -2];
        $result = $this->arrayHelper->getDoubles($array, 2);
        $this->assertEquals(2, $result);
        $array = [-1, -2, 1, 2];
        $result = $this->arrayHelper->getDoubles($array, 2);
        $this->assertEquals(0, $result);
    }
}