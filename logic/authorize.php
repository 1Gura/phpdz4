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
        $result = authorize($_POST['login'], $_POST['password']);
        if (mysqli_num_rows($result) > 0) {
            $result = mysqli_fetch_assoc($result);
            $_SESSION['isAuthorize'] = 'yes';
            setcookie('login', $_POST['login'], time() + 60 * 60 * 24 * 30, '/');
            $_SESSION['user'] = [
                'login' => "{$result['login']}",
                'full_name' => "{$result['full_name']}",
                'flag_active' => "{$result['flag_active']}",
                'email' => "{$result['email']}",
                'flag_consent' => "{$result['flag_consent']}",
                'phone' => "{$result['phone']}",
            ];
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
