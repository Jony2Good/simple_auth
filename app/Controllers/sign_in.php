<?php

namespace Auth\Controllers;

session_start();

require_once '../Models/Connection_db.php';

use Auth\App\Connection_db;

$db = new Connection_db();

if (isset($_POST)) {
    $login = $_POST['login'];
    $pas = md5($_POST['password']);

    $query = "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$pas'";
    $res = $db->getUser($query);
    var_dump($res);

    if (!empty($res)) {
        $_SESSION['user'] = [
            'id' => $res['id'],
            'name' => $res['name'],
            'email' => $res['email'],
            'avatar' => $res['avatar']
        ];
        header('Location: ../../view/profile.php');

    } else {
        $_SESSION['error'] = "Неверный логин или пароль";
        header('Location: ../../index.php');

    }
}