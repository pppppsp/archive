<?php
session_start();
require_once "sql_connect.php";

$surname = $_POST['surname'];
$name = $_POST['name'];
$midname = $_POST['midname'];
$conf_pass = $_POST['conf_pass'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$date = $_POST['date'];


if ($pass === $conf_pass and strlen($pass) > 5 and strlen($name) > 2 and strlen($surname) > 2 and strlen($midname) > 4) {
    $pass = md5($pass);
    $userPaper = $login; 

    $doubleuser =  mysqli_query($connect, "SELECT count(*) AS count FROM `users` WHERE login = '$login'"); // получение таких же пользователей
    $doubleuser = mysqli_fetch_assoc($doubleuser); // количество
    if ($doubleuser['count'] > 0) {
        $_SESSION['message'] = 'Пользователь с таким логином уже существует';
        header("Location: ../signup.php");
    } else {
        if (!is_dir('users')) { // проверка на существование папки
            mkdir('../users/' . $userPaper, 0777, true); // создание папки
            mysqli_query($connect, "INSERT INTO `users` (`id`, `surname`, `name`, `midname`, `date`, `pass`, `login`, `idrole`) VALUES (NULL, '$surname', '$name', '$midname', '$date', '$pass', '$login', '3')");
            $_SESSION['message'] = "Регистрация прошла успешно!";
            header("Location: ../signup.php");
        }
    }
} else {
    $_SESSION['message'] = "Введите корректный пароль";
    header("Location: ../signup.php");
}


