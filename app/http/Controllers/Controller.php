<?php

namespace App\http\Controllers;

use App\http\Models\Model;
use App\http\Views\View;

abstract class Controller
{
    protected Model $model;
    protected View $view;

    public function all(): void
    {
        $this->view->generateList($this->model->getAllRecords(), $this->model->headers);
    }

    public function del(): void
    {
        $ids = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
        $rowCount = $this->model->delRecords($ids['ids']);
        echo json_encode(['count' => $rowCount]);
    }

    public function add(): void
    {
        $this->view->generateAdd();
    }

    public function upd($id): void
    {
        if (isset($id[0]))
            $this->view->generateUpd($this->model->getRecordById($id[0])[0]);
    }

}