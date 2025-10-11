<?php

namespace App\http\Controllers;

use App\http\Models\model_user;
use App\http\Views\view_user;

class User extends Controller
{
    function __construct()
    {
        $this->model = new model_user();
        $this->view = new view_user();
    }

    public function add_user(): void
    {
        if (isset($_POST['user_name']) and isset($_POST['user_pass']) and isset($_POST['user_phone']) and isset($_POST['user_fio'])) {
            $this->model->addRecord(['user_name'  => $_POST['user_name'],
                                     'user_pass'  => password_hash($_POST['user_pass'],PASSWORD_DEFAULT),
                                     'user_phone' => $_POST['user_phone'],
                                     'user_fio'   => $_POST['user_fio']]);
        }
        header('Location: /user/all');
    }

    public function upd_user(): void
    {
        if (isset($_POST['id_user']) and isset($_POST['user_name']) and isset($_POST['user_pass']) and isset($_POST['user_phone']) and isset($_POST['user_fio'])) {
            $this->model->updRecord(['id_user'    => $_POST['id_user'],
                                     'user_name'  => $_POST['user_name'],
                                     'user_pass'  => password_hash($_POST['user_pass'],PASSWORD_DEFAULT),
                                     'user_phone' => $_POST['user_phone'],
                                     'user_fio'   => $_POST['user_fio']]);
        }
        header('Location: /user/all');
    }

    public function login($result = null): void
    {
        if (isset($result[0]) && $result[0] == "wrong")
            $this->view->showLoginForm();
        else
            $this->view->showLoginForm("hidden");
    }

    public function check(): void
    {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $user = $this->model->checkUser($_POST["username"], $_POST["password"]);
            if ($user > -1){
                $this->model->addUserAuth($user, $_POST["remember"]);
                header("Location: /");
            } else {
                header("Location: /user/login/wrong");
            }
        }
    }

    public function checkAuth(): bool
    {
        if (isset($_COOKIE["id_ses"])){
            $result = $this->model->getUserBySesId($_COOKIE["id_ses"]);
            if (isset($result[0]['id_user'])){
                $_SESSION['user'] = $result[0]['id_user'];
                $_SESSION['shop'] = $result[0]['id_shop'];
                return true;
            }
        }
        return false;
    }

    public function logout(): void
    {
        session_start();
        unset($_SESSION['user']);
        unset($_SESSION['shop']);
        header("Location: /");
    }

}