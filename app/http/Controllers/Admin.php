<?php

namespace App\http\Controllers;

use App\http\Views\view_admin;

class Admin extends Controller
{
    function __construct()
    {
        $this->view = new view_admin();
    }

    public function show($params = ""): void
    {
        $this->view->generate('','template_admin.php');

    }

}