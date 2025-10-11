<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet"
          href="http://<?= $_SERVER['SERVER_NAME'] ?>:<?= $_SERVER['SERVER_PORT'] ?>/css/login.css">
    <link rel="shortcut icon"
          href="http://<?= $_SERVER['SERVER_NAME'] ?>:<?= $_SERVER['SERVER_PORT'] ?>/bread.png"/>
</head>
<body>
<div id="login-form">
    <h1>Авторизация</h1>
    <form method="post" action="http://<?= $_SERVER['SERVER_NAME'] ?>:<?= $_SERVER['SERVER_PORT'] ?>/user/check">
        <input type="text" name="username" placeholder="Имя" id="username">
        <input type="password" name="password" placeholder="Пароль" id="password">
        <div><input type="checkbox" name="remember" id="remember"><label for="remember">Запомнить
                меня</label></div>
        <div id="wrong" <?= $hide ?>>Неверный логин/пароль</div>
        <input type="submit" value="Вход">
    </form>
</div>
</body>
<script src="http://<?= $_SERVER['SERVER_NAME'] ?>:<?= $_SERVER['SERVER_PORT'] ?>/js/script.js"></script>
</html>


