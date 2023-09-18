<?php
include "../config/config.php";

//1. определяем страницу 
$page = 'index';
if (isset ($_GET['page'])) {
    $page = $_GET['page'];
}
$params =[];

// кейсы с хранением параметров для каждой страницы
switch ($page){
    case 'index':
        $params ['title'] = 'Главная';
        break;

    case 'catalog':
        $params ['title'] = 'Католог';
        $params ['catalog'] = getCatalog();
        break;

    case 'about':
        $params ['title'] = 'О нас';
        $params ['phone'] = 1234;
        break;

    default:
    echo "404";
    die();
}

//запускаем функцию для рендера страницы
echo render ($page, $params);

