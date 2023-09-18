<?php
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

