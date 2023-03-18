<?php
session_start();
require_once 'include/sql_connect.php';
require 'include/remakeUser.php'; // добавление функций
// require_once 'include/allusers.php';
if (!($_SESSION['user'])) {
    header("Location: signup.php");
}
$title = "Настройки пользователя";
$userid = $_SESSION['user']['id'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require 'blocks/head.php'; ?>
</head>

<body>
    <!-- header start -->

    <? require 'blocks/header.php'; ?>

    <!-- header end -->

    <!-- settings start -->

    <? require './blocks/blockSettings.php';?>

    <!-- setings end -->

    <!-- footer start -->

    <? require 'blocks/footer.php'; ?>

    <!-- footer end -->
</body>

</html>