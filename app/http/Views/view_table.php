<?php

namespace App\http\Views;

class view_table extends View
{
    public function generateTable($children, $month, $year, $holidays): void
    {
        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        ob_start();
        echo "<table id='tabel'>";
        echo "<thead>";
        echo "<tr><th rowspan='2'>№ п/п</th><th rowspan='2' id='fio'>Фамилия, имя ребёнка</th><th rowspan='2'>Номер счёта</th>
              <th colspan='$days'>Дни  посещения</th><th colspan='2'>Пропущено дней</th><th rowspan='2'>Дни посящения подлежащие оплате</th><th rowspan='2'>Причины непосящения (основание)</th>";
        echo "<tr>";
        for ($i = 1; $i <= $days; $i++) {
            echo "<th class='dates'>$i</th>";
        }
        echo "<th>По болезни</th><th>Прочие</th></tr></thead><tbody>";
        $num=0;
        foreach ($children as $child) {
            $num++;
            echo "<tr><td>$num</td><td>$child</td><td></td>";
            for ($i = 1; $i <= $days; $i++) {
                if (in_array($i,$holidays))
                    echo "<td>В</td>";
                else
                    echo "<td></td>";
            }
            echo "<td></td><td></td><td></td><td></td></tr>";
        }
        echo "</tbody><tfoot><tr><td></td><td>Всего присутствует детей</td><td></td>";
        for ($i = 1; $i <= $days; $i++) {
            echo "<td></td>";
        }
        echo "<td></td><td></td><td></td><td></td></tr>";
        echo "<tr><td></td><td>Всего отсутствует детей</td><td></td>";
        for ($i = 1; $i <= $days; $i++) {
            echo "<td></td>";
        }
        echo "<td></td><td></td><td></td><td></td></tr>";
        echo "</tfoot></table>";
        $this->generate(ob_get_clean(), "template_table.php");
    }
}