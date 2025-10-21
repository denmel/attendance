<?php

namespace App\http\Views;

class view_children extends View
{
    public function generateGroups($groups,$children): void
    {
        ob_start();
        echo "<form id='groups'><legend>Список всех групп</legend>";
        foreach ($groups as $id=>$group) {
            echo "<div><input type='radio' id='$id' name='group' value='$id'/><label for='$id'>Группа №$group</label></div>";
        }
        echo "<div class='button' id='add-group'>Добавить</div>";
        echo "</form>";
        echo "<div id='children_list'>";
        echo "<table id='children_table'>";
        echo "<thead>";
        echo "<tr><th>Фамилия, имя ребёнка</th><th>Номер счёта</th></tr></thead><tbody>";
        foreach ($children as $id=>$child) {
            echo "<tr data-idchild='$id' data-idgroup='$child[0]'><td>$child[1]</td><td></td></tr>";

        }
        echo "</tbody></table>";
        echo "<div class='button' id='add-child'>Добавить</div>";
        echo "</div>";
        $this->generate(ob_get_clean(), "template_children.php");
    }
}