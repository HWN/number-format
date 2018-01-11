<?php
/**
 * Created by PhpStorm.
 * Name: number-format.php
 * 作者: 黄伟楠
 * 日期: 2018/1/11
 * 时间: 15:14
 * 功能:
 */

/**
 * @param int $num     需要转换的数字
 * @param int $decimal 小数点后保留多少位数，默认8,为0着
 *
 * @return string
 */
function numberToString($num = 0, $decimal = 0)
{
    if (false !== $eIndex = stripos($num, "e")) {
        $a = explode("e", strtolower($num));
        if (false !== stripos($num, "-")) {
            $d = explode("-", $num);
            $double = $d[1];
            if (false !== $pointIndex = stripos($num, ".")) {
                $double += $eIndex - $pointIndex - 1;
            }
        } else {
            $d = explode("+", $num);
            $double = $d[1];
        }
        $num = bcmul($a[0], bcpow(10, $a[1], $double), $double);
    } else {
        $num = (string)$num;
    }
    if ($decimal > 0) {
        return sprintf("%01.{$decimal}f", $num);
    } else {
        return $num;
    }
}