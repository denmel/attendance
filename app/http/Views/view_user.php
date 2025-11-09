<?php

namespace App\http\Views;

class view_user extends View
{
    private int $position = 4;
    protected array $sub_menu_items = [['caption' => 'Добавить пользователя', 'id' => 'btn_add', 'action' => '/user/add'],
        ['caption' => 'Удалить', 'id' => 'btn_del', 'action' => '/user/del']
    ];

    public function generateList($rows, $headers): void
    {
        $content = $this->arrayToTable($rows, $headers, "list","user");
        $this->generate($content, "template_main.php", 'Пользователи');
    }

    public function generateAdd(): void
    {
        ob_start();
        $src = '/user/add_user';
        echo "<form action='$src' method='POST'/>";
        echo $this->createInput("Имя пользователя", "text", "user_fio");
        echo $this->createInput("Логин", "text", "user_name");
        echo $this->createInput("Пароль", "password", "user_pass");
        echo $this->createInput("Телефон", "text", "user_phone");
        echo "<div class='form-btn'><input type='button' value='Отмена' onclick='location.href=\"/user/all\";'>";
        echo "<input type='Submit' value='Добавить'></div>";
        echo "</form>";
        $this->generate(ob_get_clean(), $this->generateMainMenu($this->position), $this->generateSubMenu(), "template_main.php", "Добавление магазина");
    }

    public function generateUpd($row): void
    {
        ob_start();
        $src = '/user/upd_user';
        echo "<form action='$src' method='POST'>";
        echo $this->createInput("Id", "text", "id_user", $row['id_user']);
        echo $this->createInput("Имя пользователя", "text", "user_fio", $row['user_fio']);
        echo $this->createInput("Логин", "text", "user_name", $row['user_name']);
        echo $this->createInput("Пароль", "password", "user_pass", $row['user_pass']);
        echo $this->createInput("Телефон", "text", "user_phone", $row['user_phone']);

        echo "<div class='form-btn'><input type='button' value='Отмена' onclick='location.href=\"/user/all\";'>";
        echo "<input type='submit' value='Изменить'>";
        echo "</form>";
        $this->generate(ob_get_clean(), $this->generateMainMenu($this->position), $this->generateSubMenu(), 'template_main.php', "Редактирование магазина");
    }
    public function showLoginForm($hide = ""): void
    {
        include_once "template_login.php";
    }

}