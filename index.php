<?php
session_start();
require_once "include/sql_connect.php";
$title = "Главная";

$users = mysqli_query($connect, "SELECT * FROM `users`");
$number_of_account = mysqli_num_rows($users);

$numberApprovedD = $dbh->query("SELECT count(*) AS count FROM `diplom` WHERE `diplom`.`score` = 'Одобрено'");
$numberApprovedD->execute([]);
$resultApprovedD = $numberApprovedD->FetchAll(PDO::FETCH_ASSOC);

$theBestUser = $dbh->query("SELECT count(*) AS count FROM `diplom` WHERE `diplom`.`mark` = 5 ");
$theBestUser->execute([]);
$resultTheBest = $theBestUser->FetchAll(PDO::FETCH_ASSOC);

$centerScore = $dbh->query("SELECT avg(`diplom`.`mark`) as `score` from `diplom` WHERE `diplom`.`mark` > 0");
$centerScore->execute([]);
$resultScore = $centerScore->FetchAll(PDO::FETCH_ASSOC);
// var_dump($resultScore);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require 'blocks/head.php'; ?>
</head>

<body>
    <!-- header start -->

    <? require 'blocks/header.php'; ?>

    <!-- hero  -->
    <? require 'blocks/hero.php'; ?>
    <!-- hero -->

    <!-- header end -->

    <!--  statistics start-->

    <? require 'blocks/statistic.php'; ?>

    <!--  statistics end-->

    <!-- footer start -->

    <? require 'blocks/footer.php'; ?>

    <!-- footer end -->


</body>

</html>