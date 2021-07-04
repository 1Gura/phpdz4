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
    ]
];
if (!empty($_SESSION['isAuthorize']) && $_SESSION['isAuthorize'] = 'yes') {
    $mainMenu[] = [
        'title' => 'Личный кабинет',
        'path' => '/route/personal-area/',
        'sort' => 6
    ];
}