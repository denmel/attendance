<?php

namespace App\http\Models;

class model_group extends Model
{
    function get_groups(): array
    {
        $result = [];
        $rows = $this->db->select("select id_group, group_num from kindergarten.groups");
        foreach ($rows as $row) {
            $result[$row[0]] = $row[1];
        }
        return $result;
    }

}