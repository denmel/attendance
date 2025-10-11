<?php

namespace App\http\Views;
abstract class View
{
    function generate($content, $template, $name = 'Document'): void
    {
        include $template;
    }
    public function arrayToTable($rows, $headers, $class = null, $id = null): false|string
    {
        $keys = array_keys($headers);
        ob_start();
        echo "<table";
        if ($class) echo " class='$class'";
        if ($id) echo " id='$id'";
        echo "><thead><tr><th>№</th>";
        foreach (array_slice($headers, 1) as $header) {
            echo "<th>$header</th>";
        }
        echo "</tr></thead><tbody>";
        $num = 0;
        foreach ($rows as $row) {
            echo sprintf("<tr data-id='%d'><td>%d</td>", $row[0], ++$num);
            foreach (array_slice($keys, 1) as $key) {
                echo "<td>$row[$key]</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
        return ob_get_clean();
    }

    public function createInput($label, $type, $name, $value = ''): false|string
    {
        ob_start();
        if (str_starts_with($name, 'id')) {
            echo "<input type='$type' id='$name' name='$name' value='$value' hidden/><br>";
        } else {
            echo "<label for='$name'>$label:</$label><br>";
            echo "<input type='$type' id='$name' name='$name' value='$value'/></label><br>";
        }
        return ob_get_clean();
    }

    public function createSelect($label, $name, $values = [], $selectedId = null): false|string
    {
        ob_start();
        echo "<label for='$name'>$label:<br>";
        echo "<select id='$name' name='$name'/>";
        foreach ($values as $key => $value) {
            echo sprintf("<option value='%s' %s>%s</option>",$key, $selectedId == $key ? "selected" : " ",$value);
        }
        echo "</select></label><br>";
        return ob_get_clean();
    }
}