<?php
session_start();
require 'sql_connect.php';

$diplomid = $_POST['diplom'];


function updateStatus($dbh, $diplomid)
{
    $queryStatus = $dbh -> prepare("UPDATE `diplom` SET `score` = ? WHERE `diplom`.`id` = ?");
}
