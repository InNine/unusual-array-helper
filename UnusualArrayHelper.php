<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.11.2019
 * Time: 23:34
 */

class UnusualArrayHelper
{

    /**
     * @param array $array
     * @param int $sum
     * @return bool
     */
    public function checkSum($array, $sum): bool
    {
        asort($array);
        $halfOfSum = round($sum / 2, 0, PHP_ROUND_HALF_UP);
        //Нет смысла искать сумму, если ни одно из слагаемых не >= половине суммы
        if ($halfOfSum > end($array)) {
            return false;
        }
        foreach ($array as $key => $value) {
            //Достаточно проверить массив до элементов, которые >= половины суммы
            if ($value > $halfOfSum) {
                return false;
            }
            $num2 = $sum - $value;
            unset($array[$key]);
            if (in_array($num2, $array)) {
                return true;
            }
        }
        return false;
    }


    /**
     * @param array $array
     * @return string
     */
    public function getPrefix($array): string
    {
        if (empty ($array)) {
            return '';
        }
        $prefix = $array[0];
        $countWords = strlen($prefix);
        for ($i = 1; $i < count($array); $i++) {
            $string = mb_strimwidth($array[$i], 0, $countWords);
            if ($string != $prefix) {
                $prefix = $this->checkPrefix($prefix, $string);
                if ($prefix == '') {
                    break;
                }
                $countWords = strlen($prefix);
            }
        }
        return $prefix;
    }

    /**
     * @param string $prefix
     * @param string $string
     * @return string
     */
    private function checkPrefix($prefix, $string): string
    {
        while ($prefix != $string && $prefix != '') {
            $prefix = mb_substr($prefix, 0, -1);
            $string = mb_substr($string, 0, -1);
        }
        return $prefix;
    }

    /**
     * @param array $array
     * @param int $k
     * @return int
     */
    public function getDoubles($array, $k): int
    {
        $count = 0;
        //Проверка на положительный/отрицательный шаг, при $k = 0 - возвращаем 0
        if ($k < 0) {
            for ($i = ($k * -1); $i < count($array); $i++) {
                if ($array[$i] == $array[$i + $k]) {
                    $count++;
                }
            }
        } else if ($k > 0) {
            for ($i = 0; $i < count($array) - $k; $i++) {
                if ($array[$i] == $array[$i + $k]) {
                    $count++;
                }
            }
        }
        return $count;
    }
}