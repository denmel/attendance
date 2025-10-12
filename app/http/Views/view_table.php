<?php

namespace App\http\Views;

class view_table extends View
{
    public function generateTable($children, $absent, $month, $year, $holidays): void
    {
        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        ob_start();
        echo "<table id='tabel'>";
        echo "<thead>";
        echo "<tr><th rowspan='2'>№ п/п</th><th rowspan='2' id='fio'>Фамилия, имя ребёнка</th><th rowspan='2'>Номер счёта</th>
              <th colspan='$days'>Дни  посещения</th><th colspan='2'>Пропущено дней</th><th rowspan='2'>Дни посящения подлежащие оплате</th><th rowspan='2'>Причины непосещения (основание)</th>";
        echo "<tr>";
        for ($i = 1; $i <= $days; $i++) {
            echo "<th class='dates'>$i</th>";
        }
        echo "<th>По болезни</th><th>Прочие</th></tr></thead><tbody>";
        $num=0;
        foreach ($children as $id=>$child) {
            $num++;
            echo "<tr data-id='$id'><td>$num</td><td>$child</td><td></td>";
            for ($i = 1; $i <= $days; $i++) {
                if (in_array($i,$holidays)) {
                    echo "<td class='weekend'></td>";
                }
                else{
                    if (in_array($id,array_keys($absent)) && in_array($i,array_keys($absent[$id]))) {
                        switch ($absent[$id][$i]){
                            case 1:
                                echo "<td class='absent'></td>";
                                break;
                            case 2:
                                echo "<td class='ill'></td>";
                                break;
                            case 3:
                                echo "<td class='out'></td>";
                                break;
                        }
                    }
                    else
                        echo "<td class='present'></td>";
                }

            }
            echo "<td></td><td></td><td></td><td></td></tr>";
        }
        echo "</tbody><tfoot><tr><td></td><td>Всего присутствует детей</td><td></td>";
        for ($i = 1; $i <= $days; $i++) {
            echo "<td></td>";
        }
        echo "<td rowspan='2'></td><td rowspan='2'></td><td rowspan='2'></td><td rowspan='2'></td></tr>";
        echo "<tr><td></td><td>Всего отсутствует детей</td><td></td>";
        for ($i = 1; $i <= $days; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
        echo "</tfoot></table>";
        $this->generate(ob_get_clean(), "template_table.php");
    }
}