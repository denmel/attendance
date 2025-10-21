<?php

namespace App\http\Controllers;

use App\http\Models\Model;
use App\http\Models\model_children;
use App\http\Models\model_table;
use App\http\Views\view_table;

class Table extends Controller
{
    private Model $children;
    function __construct()
    {
        $this->model = new model_table();
        $this->children = new model_children();
        $this->view = new view_table();
    }

    public function show($params = ""): void
    {
        $this->view->generateTable(
            $this->children->get_children(1),
            $this->model->get_absent(1),
            10,2025,
            $this->model->get_holidays(10,2025));

    }

}