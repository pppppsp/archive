<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
session_start();
require_once 'sql_connect.php';
$theme = $_POST['theme'];
$countpages = $_POST['countpages'];
$document = $_FILES['document'];
$filesize = $document["size"] / 1000000; // вычисление
$maxsize = 20; // mb
$login = $_SESSION['user']['login'];
$userid = $_SESSION['user']['id'];
$mark = 0;

if ($filesize > $maxsize) { // проверка размера документа
    $_SESSION['message'] = "Превышает размер";
    header("Location: ../anti.php");
}

if (strlen($countpages) > 1) {
    if (empty($document)) {
        $_SESSION['message'] = "Закиньте отправляемый файл";
        header("Location: ../anti.php");
    }
    else { 
        $User = mysqli_query($connect, "SELECT count(*) AS count FROM `diplom` WHERE `iduser` = '$userid' LIMIT 1"); // находим пользователя
        $countUser = mysqli_fetch_assoc($User); // количество
        //var_dump($countUser);
        if (strlen($theme) > 5) {
            $format = pathinfo($document['name'], PATHINFO_EXTENSION); //получаем формат
            $filename = time() . "." . $format; // слить время с названием файла, от повторений
            if ($countUser["count"] >= 1) { // также про юзера, он не может выбрать тему больше одного раза
                $_SESSION['message'] = "Вы не можете кидать на проверку больше одной темы";
                header("Location: ../anti.php");
            } else {
                if (!is_dir('../users/' . $login)) { // проверка на существование папки пользователя
                    mkdir('../users/' . $_SESSION['user']['login'] . "/document/"); // создание дериктории
                    move_uploaded_file($document["tmp_name"], '../users/' .  $_SESSION['user']['login'] . "/document/" . $filename);  // перемещение из временной папки в настоящюю
                    $_SESSION['message'] = "Успешно!";
                    header("Location: ../anti.php");
                } else {
                    mkdir('../users/' . $_SESSION['user']['login'] . "/document/"); // создание дериктории
                    move_uploaded_file($document["tmp_name"], '../users/' .  $_SESSION['user']['login'] . "/document/" . $filename);  // перемещение из временной папки в настоящюю
                    $src = '../users/' .  $_SESSION['user']['login'] . "/document/" . $filename;
                    mysqli_query($connect, "INSERT INTO `diplom` (`id`, `iduser`, `theme`, `countpages`, `src`,`mark`) VALUES (NULL, '$userid', '$theme', '$countpages', '$src','$mark')"); // Добавление в бд
                    $_SESSION['message'] = "Успешно! Ждите результат.";
                    header("Location: ../anti.php");
                }
            }
        } else {
            $_SESSION['message'] = "Тема слишком маленькая";
            header("Location: ../anti.php");
        }
    }
} else {
    $_SESSION['message'] = "Введите количество страниц";
    header("Location: ../anti.php");
}
