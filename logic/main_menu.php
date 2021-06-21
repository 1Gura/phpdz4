<?php
function arraySort($menu, $key = 'sort', $sort = SORT_ASC)
{
//    usort($menu, mySort($key, $sort));
    array_multisort($menu, $sort, array_column($menu, $key));
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
    $menu = arraySort(
        $menu,
        $position === 'header' ? 'sort' : 'title',
        $position === 'header' ? SORT_ASC : SORT_DESC);
    renderMenu($menu, $position);
}

function getTitle($menu)
{
    foreach ($menu as $item) {
        if (isCurrentUrl($item['path'])) {
            return "<h1>{$item['title']}</h1>";
        }
    }
    return 'Страница не найдена';
}

function isCurrentUrl($path = '/')
{
    return $path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function cutString($line, $length = 12, $appends = '...'): string
{
    return mb_strimwidth($line, 0, $length, $appends);
}