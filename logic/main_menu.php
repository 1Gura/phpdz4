<?php
$mainMenu = [
    [
        'title' => 'Главное меню текст для точек',
        'path' => '/',
        'sort' => 5
    ],
    [
        'title' => 'О нас',
        'path' => '/route/about/',
        'sort' => 2,
    ],
    [
        'title' => 'Контакты',
        'path' => '/route/contacts/',
        'sort' => 4,
    ],
    [
        'title' => 'Новости',
        'path' => '/route/news/',
        'sort' => 3,
    ],
    [
        'title' => 'Каталог',
        'path' => '/route/catalog/',
        'sort' => 1,
    ],
];

function arraySort($menu, $key = 'sort', $sort = SORT_ASC)
{
    usort($menu, mySort($key, $sort));
    return $menu;
}

function mySort($key, $sort): Closure
{
    if ($sort === SORT_ASC) {
        return function ($a, $b) use ($key) {
            return $a[$key] <=> $b[$key];
        };
    } else if ($sort === SORT_DESC) {
        return function ($a, $b) use ($key) {
            if ($a === $b) return 0;
            return $a < $b ? 1 : -1;
        };
    }

}

function renderMenu($menu, $position = 'header')
{
    $style = $position === 'footer' ? 'bottom' : '';
    include $_SERVER['DOCUMENT_ROOT'] . './templates/menu.php';
}

function showMenu($position, $menu)
{
    if ($position === 'header') {
        $menu = arraySort($menu);
        renderMenu($menu);
    } else if ('footer') {
        $menu = arraySort($menu, 'title', SORT_DESC);
        renderMenu($menu, $position);
    }
}

function getTitle($menu) {
    foreach ($menu as &$item) {
        if ((isCurrentUrl($item['path']))) {
            echo "<h1>{$item['title']}</h1>";
            break;
        }
    }
}

function isCurrentUrl($path = '/') {
    if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {

        return true;
    }
    return false;
}

function cutString($line, $length = 12, $appends = '...'): string {
    return mb_strimwidth($line,0,$length, $appends);
}