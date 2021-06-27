<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/include/info.php';
$success = false;
$error = false;
if(!empty($_COOKIE['login'])) {
    $_POST['login'] = $_COOKIE['login'];
}
if (!empty($_POST)) {
    if (!empty($_POST['submit'])) {
        if ($_POST['login'] == $login && $_POST['password'] == $password) {
            $_SESSION['isAuthorize'] = 'yes';
            setcookie('login', $_POST['login'], time() + 60 * 60 * 24 * 30, '/');
        } else {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: ../?login=yes&error=yes');
            exit();

        }

    }
}
header('Location: ../?login=yes&error=no');
exit();
