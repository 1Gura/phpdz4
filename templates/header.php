<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/logic/hitCookie.php';

if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) !== '/') {

    if (empty($_SESSION)) {
        header('Location: ../../');
        exit();
    } else if ($_SESSION['isAuthorize'] !== 'yes') {
        header('Location: ../../');
        exit();
    }
}
require $_SERVER['DOCUMENT_ROOT'] . '/logic/main_menu_array.php';
require $_SERVER['DOCUMENT_ROOT'] . '/logic/main_menu.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/info.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../../styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">

    <div class="logo"><img src="../../i/logo.png" width="68" height="23" alt="Project"></div>
    <div class="header-link">
        <?php

        if (!empty($_SESSION['isAuthorize']) && $_SESSION['isAuthorize'] === 'yes') { ?>
        <a href="../logic/logout.php">Выйти</a>
        <?php } else { ?>
        <a href="/?login=yes">Авторизоваться</a>
        <?php } ?>

    </div>
    <div class="clearfix"></div>
</div>
<div class="clear">
    <?= showMenu('header', $mainMenu) ?>
    <?= getTitle($mainMenu) ?>
</div>

