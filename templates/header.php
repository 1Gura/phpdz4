<?php
include $_SERVER['DOCUMENT_ROOT'] . './main_menu.php';
include $_SERVER['DOCUMENT_ROOT'] . './block.php';
include $_SERVER['DOCUMENT_ROOT'] . './include/success.php';
include $_SERVER['DOCUMENT_ROOT'] . './logins.php';
include $_SERVER['DOCUMENT_ROOT'] . './passwords.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="../i/logo.png"  width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>
<div class="clear">
    <?=showMenu('header', $mainMenu)?>
</div>

