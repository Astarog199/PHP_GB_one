<?php
define('TEMPLATES_DIR', 'templates/');
//Расположение основной страницы
define('LAYOUTS_DIR', 'layouts/'); 

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

function getCatalog() {
    return [
        [
            'name' => 'товар 1',
            'price' => 100,
            'image' => '1.jpg'
        ],
        [
            'name' => 'товар 2',
            'price' => 110,
            'image' => '2.jpg'
        ],
        [
            'name' => 'товар 3',
            'price' => 120,
            'image' => '3.jpg'
        ],
    ];
}

//2. собираем выбранную страницу в п.1 с параметрами в п.2 
function render ($page, $params = []) {
    return renderTemplate (LAYOUTS_DIR . 'main', [
        'title' => $params ['title'],
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate ($page, $params)
    ]);
}


//$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблонаж  ]
function renderTemplate($page, $params = []) {

    foreach ($params as $key => $value){
        $$key = $value;
    }

    
    //extract($params); заменяет foreach

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}
