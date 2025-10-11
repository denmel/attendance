<?php

namespace App\http\Models;


class model_children extends Model
{
    function get_children($group): array
    {
        return array_column($this->db->select("select child_name from kindergarten.children where id_group = $group"),0);
    }

}