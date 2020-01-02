<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */

namespace DtApp\Timer;

class Time
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    /**
     * 当前时间
     * @param string $format 格式
     * @return false|string
     */
    public static function getData($format = "Y-m-d H:i:s")
    {
        date_default_timezone_set('Asia/Shanghai');
        return date($format, time());
    }

    /**
     * 当前时间戳
     * @return false|string
     */
    public static function getTime()
    {
        date_default_timezone_set('Asia/Shanghai');
        return time();
    }

    /**
     * 毫秒时间
     * @return false|string
     */
    public static function getUDate()
    {
        date_default_timezone_set('Asia/Shanghai');
        $msec = 0;
        list($msec, $sec) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }

    /**
     *  计算两个时间差
     * @param string $end_time 结束时间
     * @param string $start_time 开始时间
     * @return false|int
     */
    public static function getTimeDifference($end_time, $start_time)
    {
        date_default_timezone_set('Asia/Shanghai');
        $end_time = strtotime($end_time);
        $start_time = $start_time == '' ? strtotime(self::getData('Y-m-d H:i:s')) : strtotime($start_time);
        return $end_time - $start_time;
    }

    /**
     * 将指定日期转换为时间戳
     * @param string $date
     * @return false|int
     */
    public static function dateToTimestamp($date)
    {
        date_default_timezone_set('Asia/Shanghai');
        return strtotime($date);
    }

    /**
     * 获取某个时间之后的时间
     * @param string $format 格式
     * @param int $mun 多少分钟
     * @return false|string
     */
    public static function dateRear($format = "Y-m-d H:i:s", $mun = 10)
    {
        date_default_timezone_set('Asia/Shanghai');
        return date($format, strtotime(self::getData()) + $mun);
    }

    /**
     * 获取某个时间之前的时间
     * @param string $format 格式
     * @param int $mun 多少分钟
     * @return false|string
     */
    public static function dateBefore($format = "Y-m-d H:i:s", $mun = 10)
    {
        date_default_timezone_set('Asia/Shanghai');
        return date($format, strtotime(self::getData()) - $mun);
    }

    /**
     * 判断当前的时分是否在指定的时间段内
     * @param $start
     * @param $end
     * @return int   1：在范围内，0:没在范围内
     */
    public static function checkIsBetweenTime($start, $end)
    {
        date_default_timezone_set('Asia/Shanghai');
        $date = date('H:i');
        $curTime = strtotime($date);//当前时分
        $assignTime1 = strtotime($start);//获得指定分钟时间戳，00:00
        $assignTime2 = strtotime($end);//获得指定分钟时间戳，01:00
        $result = 0;
        if ($curTime > $assignTime1 && $curTime < $assignTime2) $result = 1;
        return $result;
    }
}
