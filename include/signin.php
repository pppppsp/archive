<?php
session_start();
require_once 'sql_connect.php';

$login = mysqli_real_escape_string($connect, $_POST['login']);
$pass = mysqli_real_escape_string($connect, md5($_POST['pass']));

$check_users = mysqli_query($connect, "SELECT * FROM `users` WHERE login = '$login' AND pass = '$pass'");

if(mysqli_num_rows($check_users) > 0){

    $user = mysqli_fetch_assoc($check_users);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "surname" => $user['surname'],
        "name" => $user['name'],
        "midname" => $user['midname'],
        "date" => $user['date'],
        "login" => $user['login'],
        "course" => $user['course'],
        "role" => $user['idrole']
        ];


    header('Location: ../person.php');
}else{
    $_SESSION['message'] = 'Неправильный логин или пароль...';
    header('Location: ../signin.php');
}
    
    