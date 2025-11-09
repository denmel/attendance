<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
    <link rel="stylesheet"
          href="/css/admin.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
</head>
<body>
<div id="main">
    <div id="caption"></div>
    <div id="menu">
        <label>
            <input type="radio" name="menu" value="users">
            <div class="menu-item">
                <span class="material-symbols-outlined">group</span><span class="menu-item-caption">Сотрудники</span>
            </div>
        </label>
        <label>
            <input type="radio" name="menu" value="group">
            <div class="menu-item">
                <span class="material-symbols-outlined">reduce_capacity</span><span class="menu-item-caption">Группы</span>
            </div>
        </label>
        <label>
            <input type="radio" name="menu" value="children">
            <div class="menu-item">
                <span class="material-symbols-outlined">child_hat</span><span class="menu-item-caption">Дети</span>
            </div>
        </label>
        <label>
            <input type="radio" name="menu" value="parents">
            <div class="menu-item">
                <span class="material-symbols-outlined">family_group</span><span class="menu-item-caption">Родители</span>
            </div>
        </label>
        <label>
            <input type="radio" name="menu" value="attendance">
            <div class="menu-item">
                <span class="material-symbols-outlined">table_edit</span><span class="menu-item-caption">Посещаемость</span>
            </div>
        </label>

    </div>
    <div id="content"></div>
</div>
</body>
</html>

