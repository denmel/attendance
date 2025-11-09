<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $name ?></title>
</head>
<body>
<div id="main-layout">
    <header>
        <div id="logo">
            ИС "Пекарня"
        </div>
        <div id="user-block">
            <label for="user-caption">Юзер <span class="material-symbols-rounded">keyboard_arrow_down</span></label><input type="checkbox" id="user-caption">
            <div id="user-menu" class="hide">
                <div class="user-menu-item"><span class="material-symbols-rounded mini-btn">person</span><span>Профиль</span></div>
                <div class="user-menu-item" onclick="location.href='/user/logout'"><span class="material-symbols-rounded mini-btn">logout</span><span>Выйти</span></div>
            </div>

        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
</div>
</body>
<script src="/js/script.js"></script>
</html>


