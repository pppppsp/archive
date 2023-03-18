<?php
session_start();
require 'include/sql_connect.php';
$title = "Редактирование";

$queryGroup = $dbh->query("SELECT * FROM `groups`"); // получение всех групп
$resultGroup = $queryGroup->fetchAll(PDO::FETCH_ASSOC); // образование в массив из объекта

$queryRole = $dbh->prepare("SELECT * FROM `roles` WHERE `id` = ?"); // получение нужной роли пользователя
$queryRole->execute([$_POST['user'][9]]);
$resultRoles = $queryRole->fetchall(PDO::FETCH_ASSOC);

$roleList = $dbh->query("SELECT * FROM `roles`"); // получение всех ролей
$resultRolList = $roleList->fetchall(PDO::FETCH_ASSOC);

$moderRole = 4;  //айди роли модера 
// var_dump($userRole);
$accountRole = $_SESSION['user']['role']; // берем айди из сессии пользователя
// var_dump($accountRole);

if (!($_SESSION['user'])) {
    header("Location: signup.php");
}

$userRole = $_SESSION['user']['role'];

switch ($userRole) {
    case 3:
        header("Location: signup.php");
        break;
    case 2:
        header("Location: signup.php");
        break;
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <? require 'blocks/head.php'; ?>
</head>

<body>
    <!-- header start -->
    <? require 'blocks/adminHeader.php'; ?>
    <!-- header end -->

    <!-- edit start  -->

    <div class="edit-layout container mt-5">
        <div class="edit-block">
            <div class="avatar-edit">
                <img src="./assets/img/personal/avatar.png" alt="avatar.png">
            </div>
            <div class="gg p-4 box">
                <p class=" is-size-5 mb-4">Редактирование пользователя</p>
                <form class="edit_information" action="include/editUser.php" method="post" enctype="multipart/form-data">

                    <!-- редактирование пользователя  -->

                    <? require './blocks/blockRDU.php'; ?>

                    <!-- редактирование пользователя конец -->

                </form>
            </div>
        </div>


    </div>

    <!-- edit end -->

</body>

</html>