<?php
session_start();
setcookie('login', null, -1, '/');
header('Location: ../?login=yes');
exit();
