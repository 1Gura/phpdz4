<?php
    if(!empty($_COOKIE['login'])) {
        setcookie('login',$_COOKIE['login'],time()+60*60*24*30, '/');
    }
?>