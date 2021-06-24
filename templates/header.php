<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/logic/main_menu_array.php';
require $_SERVER['DOCUMENT_ROOT'] . '/logic/main_menu.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';
var_dump($_SESSION);

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
    <div class="clearfix"></div>
</div>
<div class="clear">
    <?= showMenu('header', $mainMenu) ?>
    <?=getTitle($mainMenu)?>
</div>

