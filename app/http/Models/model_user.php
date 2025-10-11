<?php

namespace App\http\Models;
class model_user extends Model
{

    public array $headers = ["id_user" => "id", "user_fio" => "ФИО пользователя", "user_name" => "Имя пользователя", "user_phone" => "Телефон"];

    public function getAllRecords(): array
    {
        return $this->db->select("select * from users;");
    }

    public function getRecordById($id): array
    {
        return $this->db->select("select * from users WHERE id_user = $id");
    }

    public function addRecord($user): int
    {
        return $this->db->query("INSERT INTO users (user_name, user_fio, user_pass, user_phone) VALUES (:user_name, :user_fio, :user_pass, :user_phone);", $user);
    }

    public function delRecords($ids): int
    {
        $list = implode(',', $ids);
        return $this->db->query("DELETE FROM users WHERE id_users in ($list)");
    }

    public function updRecord($user): int
    {
        return $this->db->query("UPDATE users SET user_name=:user_name, user_fio=:user_fio, user_pass=:user_pass, 
                 user_phone=:user_phone WHERE id_user = :id_user;", $user);
    }

    public function checkUser(mixed $username, mixed $password)
    {
        $user = $this->db->select("select * from users where user_name = '$username';");
        return isset($user[0]['user_pass']) && password_verify($password, $user[0]['user_pass']) ? $user[0]['id_user'] : -1;
    }

    public function addUserAuth($user, $remember = false): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = $this->getRecordById($user)[0]['id_user_type'];

        if ($_SESSION['user'] != 0)
            $_SESSION['shop'] = $this->db->select("SELECT id_shop FROM shops where id_user = $user;")[0]["id_shop"];

        if ($remember) {
            $id_ses = session_id();
            $this->db->query("INSERT INTO auth (id_user, auth_id) VALUES ($user,'$id_ses')");
            $_COOKIE["id_ses"] = $id_ses;
        }
    }

    public function getAllRecordsForSelect(): array
    {
        $rows = $this->db->select("SELECT * FROM users;");
        $result = [];
        foreach ($rows as $row) {
            $result[$row["id_user"]] = $row["user_name"];
        }
        return $result;
    }

    public function getUserBySesId(mixed $id_ses): false|array
    {
        return $this->db->select("SELECT id_user, id_shop FROM auth LEFT JOIN shops USING(id_user) WHERE auth_id = $id_ses;");
    }
}