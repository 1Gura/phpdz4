<?php
const servername = "localhost";
const username = "root";
const password = "root";
const dbname = "mydb";

function connectDb()
{
    static $connect = null;
    if (null === $connect) {
        $connect = mysqli_connect(servername, username, password, dbname) or die('Connection Error');
    }
    return $connect;
}

function getUsersInfo()
{
    $connect = connectDb();
    $result = mysqli_query($connect, "select * from users");
    mysqli_close($connect);
    return $result;
}

function authorize($login, $password)
{
    $connect = connectDb();
    $login = mysqli_real_escape_string($connect, $login);
    $password = md5($password);
    $result = mysqli_query($connect, "select * from users u where u.password = '$password' AND u.login = '$login' limit 1");
    mysqli_close($connect);
    return $result;
}