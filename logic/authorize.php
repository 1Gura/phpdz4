<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/dblogic.php';
$success = false;
$error = false;

if (!empty($_COOKIE['login'])) {
    $_POST['login'] = $_COOKIE['login'];
}

if (!empty($_POST)) {
    if (!empty($_POST['submit'])) {
        $user = getUserByLogin($_POST['login'], $_POST['password']);
        if (!empty($user)) {
            $_SESSION['isAuthorize'] = 'yes';
            setcookie('login', $_POST['login'], time() + 60 * 60 * 24 * 30, '/');
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login'],
                'full_name' => $user['full_name'],
                'flag_active' => $user['flag_active'],
                'email' => $user['email'],
                'flag_consent' => $user['flag_consent'],
                'phone' => $user['phone'],
            ];
        } else {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: /?login=yes&error=yes');
            exit();
        }
    }
}
header('Location: /?login=yes&error=no');
exit();
