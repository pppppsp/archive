<?php 
session_start();
require_once 'sql_connect.php';

$userid = $_SESSION['user']['id'];
$userLogin = $_SESSION['user']['login'];
$user = mysqli_query($connect, "SELECT * FROM `diplom` WHERE `iduser` = '$userid'");
$link = mysqli_fetch_assoc($user);
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    unlink($link['src']);
    mysqli_query($connect, "DELETE FROM `diplom` WHERE id = '$delete_id'") or die('query failed');
    header('location: ../person.php');
 }
?>