<?php

namespace App\http\Models;
use DateTime;

class model_table extends Model
{
    function get_holidays($month, $year): array
    {
        $holidays = array_column($this->db->select("select holidays_date from kindergarten.holidays where month(holidays_date) = $month and year(holidays_date) = $year and holiday"),0);
        $workdays = array_column($this->db->select("select holidays_date from kindergarten.holidays where month(holidays_date) = $month and year(holidays_date) = $year and not holiday"),0);
        $result = [];
        $day = 1;
        $date = new DateTime("$year-$month-$day");
        while (date_format($date,"m")==$month) {
            $date_str =  $date->format('Y-m-d');
            if ((in_array($date_str,$holidays) || in_array(date_format($date,"w"),['0','6'])) && !in_array($date_str,$workdays)){
                $result[] = (int)date_format($date,'d');
            }
            $date->modify('+1 day');
        }
        return $result;
    }

}