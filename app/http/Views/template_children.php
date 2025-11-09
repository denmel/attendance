<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Группы</title>
    <link rel="stylesheet"
          href="/css/style.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close"/>
</head>
<body>
<div id="main">
    <?= $content ?>
</div>
<div class="modal" id="modal-window">
    <div class="back"></div>
    <div class="window">
        <span class="caption"></span>
        <div class="window-content" id="group-window">

        </div>
        <div class="window-content" id="child-window">

        </div>
        <div class="btn-close"><span class="material-symbols-outlined">
        close
        </span></div>
    </div>
</div>
</body>
<script src="/js/children.js"></script>
</html>


