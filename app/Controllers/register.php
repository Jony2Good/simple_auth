<?php

namespace Auth\Controllers;

session_start();
require_once '../Models/Connection_db.php';

use Auth\App\Connection_db;

$db = new Connection_db();


if (isset($_POST)) {
    $full_name = $_POST['name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pas = $_POST['password'];
    $pas_conf = $_POST['password_confirm'];

    if ($pas === $pas_conf) {
        $file = $_FILES;
        $path = uploadFiles($file);

        $query = "SELECT COUNT(*) as num FROM `user` WHERE `email` = '$email' OR `login` = '$login'";
        $res = $db->getUser($query);

        if (empty($path)) {
            $_SESSION['message'] = "Ошибка при загрузке файла";
            header('Location: ../../register.php');
        } elseif ($res['num'] >= 1) {
            $_SESSION['message'] = "Ошибка, введенный логин или email уже зарегистрирован";
            header('Location: ../../register.php');
        } else {
            $pas = md5($pas);
            $query = "INSERT INTO `user`(`id`, `name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$pas', '$path')";
            $db->createFields($query);

            $_SESSION['message'] = "Регистрация прошла успешно";
            header('Location: ../../index.php');
        }
    } else {
        $_SESSION['message'] = "Пароли не совпадают";
        header('Location: ../../register.php');
    }
}

function uploadFiles($file): ?string
{
    $valid_file_path = '';
    $file_temp = $file['file']['tmp_name'];
    $file_name = $file['file']['name'];
    $file_size = $file['file']['size'];
    $file_type = $file['file']['type'];

    $file_name_cmps = explode('/', $file_type);
    $file_extension = strtolower(end($file_name_cmps));
    $new_filename = md5(time() . $file_name) . '.' . $file_extension;

    $alowed_extension = ["jpg", "png", "gif", "jpeg"];

    if (in_array($file_extension, $alowed_extension)) {
        $upload_file_dir = '../../resources/images/';
        $dest_file_path = $upload_file_dir . $new_filename;

        if (move_uploaded_file($file_temp, $dest_file_path) && $file_size < 2097152) {
            $valid_file_path = $dest_file_path;
        }
    } else {
        return null;
    }
    return $valid_file_path;
}