<?php 

session_start();
require 'sql_connect.php';

$diplomid = $_POST['diplom'];
$approved = "Нет";
$mark = 0;

function updateStatus($dbh, $diplomid,$approved,$mark)
{
    $queryStatus = $dbh -> prepare("UPDATE `diplom` SET `score` = ?, `mark` = ? WHERE `diplom`.`id` = ?");
    $queryStatus -> execute([$approved,$mark,$diplomid]);
    $_SESSION['message'] = "Успешно!";
   
}
updateStatus($dbh,$diplomid,$approved, $mark);
 header("Location: ../person.php");