<?php
session_start();
require 'sql_connect.php';

$diplomid = $_POST['diplom'][0];
$mark = $_POST['diplom'][1];
// print_r($_POST['diplom']);
$approved = "Одобрено";

function updateStatus($dbh, $diplomid,$mark,$approved)
{
    $queryStatus = $dbh -> prepare("UPDATE `diplom` SET `score` = ?, `mark` = ? WHERE `diplom`.`id` = ?");
    $queryStatus -> execute([$approved, $mark,$diplomid]);
    $_SESSION['message'] = "Успешно!";
    header("Location: ../person.php");
}
updateStatus($dbh, $diplomid,$mark,$approved);
 header("Location: ../person.php");