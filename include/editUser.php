<?php
session_start();
require './sql_connect.php';
// var_dump($_POST['user']);
function editUser($dbh,$data)
{
    $id = $data[0];
    $surname = $data[1];
    $name = $data[2];
    $midname = $data[3];
    $date = $data[4];
    $login = $data[5];
    $pass = $data[6];
    $idgroup = $data[7];
    $idrole = $data[8];
    // var_dump($date);
    if(strlen($surname) > 2 and strlen($name) > 2 and strlen($midname) > 4 and strlen($login) > 3 and strlen($pass) > 5) { 
        $queryUser = $dbh -> prepare("SELECT * FROM `users` WHERE `id` = ?");
        $queryUser -> execute([$id]);
        $resultUser = $queryUser -> fetchAll(PDO::FETCH_ASSOC);
        // var_dump($resultUser);
        if($pass == $resultUser[0]["pass"]) { 
            $queryUpdate = $dbh -> prepare("UPDATE `users` SET `surname` = ?, `name` = ?, `midname` = ?, `date` = ?, `pass` = ?, `login` = ?, `idrole` = ?, `idgroup` = ? WHERE `users`.`id` = ?");
            $queryUpdate -> execute([$surname,$name,$midname,$date,$pass,$login,$idrole,$idgroup,$id]);
            $_SESSION['message'] = "Успешно."; 
            header("Location: ../adminPanel.php");
        } else { 
            $pass = md5($pass);
            $queryUpdate = $dbh -> prepare("UPDATE `users` SET `surname` = ?, `name` = ?, `midname` = ?, `date` = ?, `pass` = ?, `login` = ?, `idrole` = ?, `idgroup` = ? WHERE `users`.`id` = ?");
            $queryUpdate -> execute([$surname,$name,$midname,$date,$pass,$login,$idrole,$idgroup,$id]);
            $_SESSION['message'] = "Успешно."; 
            header("Location: ../adminPanel.php");
        }
    }
}
editUser($dbh,$_POST['user']);
