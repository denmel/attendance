<?php

namespace App\http\Controllers;

use App\http\Models\model_children;
use App\http\Models\model_group;
use App\http\Views\view_children;

class Children extends Controller
{
    private model_group $model_group;
    function __construct()
    {
        $this->model = new model_children();
        $this->view = new view_children();
        $this->model_group = new model_group();
    }

    function show(): void
    {
        $this->view->generateGroups($this->model_group->get_groups(),$this->model->get_all_children());
    }

    function children_list($id_group): void
    {
        echo json_encode($this->model->get_children($id_group));
    }

}