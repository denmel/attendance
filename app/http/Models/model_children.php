<?php

namespace App\http\Models;


class model_children extends Model
{
    function get_children($group): array
    {
        $id_group = intval($group[0]);
        $result = [];
        $rows = $this->db->select("select id_child, child_name from kindergarten.children where id_group = $id_group order by child_name");
        foreach ($rows as $row) {
            $result[$row[0]] = $row[1];
        }
        return $result;
    }

    function get_all_children(): array
    {
        $result = [];
        $rows = $this->db->select("select id_group, id_child, child_name from kindergarten.children order by id_group,child_name");
        foreach ($rows as $row) {
            $result[$row[1]] = [$row[0],$row[2]];
        }
        return $result;
    }

}