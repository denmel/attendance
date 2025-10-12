<?php

namespace App\http\Models;


class model_children extends Model
{
    function get_children($group): array
    {
        $result = [];
        $rows = $this->db->select("select id_child, child_name from kindergarten.children where id_group = $group");
        foreach ($rows as $row) {
            $result[$row[0]] = $row[1];
        }
        return $result;
    }

}