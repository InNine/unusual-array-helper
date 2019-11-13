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

    public function firstTaskProvider(): array
    {
        return [
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 12, 32, 44, 2, 12], 5, true],
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 12, 32, 44, 2, 12], 100, false],
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 12, 32, 44, 2, 12], -1, false],
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 12, 32, 44, 2, 12], 0, false],
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 12, 32, 44, 2, 12], null, false],
            [[], 1, false],
            [[-1, -2, -3], 1, false],
            [[-1, -2, -3], -3, true],
        ];
    }

    /**
     * Проверка функции дя 1 задания
     * @param array $array
     * @param int $sum
     * @param bool $expected
     * @dataProvider firstTaskProvider
     */
    public function testCheckSum($array, $sum, $expected): void
    {
        $result = $this->arrayHelper->checkSum($array, $sum);
        $this->assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function secondTaskProvider(): array
    {
        return [
            [["qwe", "qweasd", "qwsdfsdf", "tr"], ''],
            [["qwe", "qweasd", "qwsdfsdf"], 'qw'],
            [["qwe", "qeasd", "qwsdfsdf"], 'q'],
            [[], ''],
            [[13, 12, 123], '1'],
        ];
    }

    /**
     * Проверка функции для 2 задания
     * @param $array
     * @param $expected
     * @dataProvider secondTaskProvider
     */
    public function testGetPrefix($array, $expected): void
    {
        $result = $this->arrayHelper->getPrefix($array);
        $this->assertEquals($expected, $result);
    }

    public function thirdTaskProvider(): array
    {
        return [
            [[1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 4, 4, 5, 2], 8, 4],
            [[1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 4, 4, 5, 2], 10, 0],
            [[1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 4, 4, 5, 2], 12, 1],
            [[1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 4, 4, 5, 2], -8, 4],
            [[1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 4, 4, 5, 2], 0, 0],
            [[], 8, 0],
            [[-1, -2, -1, -2], 2, 2],
            [[-1, -2, 1, 2], 2, 0],
        ];
    }

    /**
     * проверка функции для 3 задания
     * @param array $array
     * @param int $k
     * @param int $expected
     * @dataProvider thirdTaskProvider
     */
    public function testGetDoubles($array, $k, $expected): void
    {
        $result = $this->arrayHelper->getDoubles($array, $k);
        $this->assertEquals($expected, $result);

    }
}