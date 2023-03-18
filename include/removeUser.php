<?php

require_once 'sql_connect.php';

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    function removeUser($dbh, $id)
    {
        try { 
            $queryUser = $dbh->prepare("DELETE FROM `users` WHERE `id` = ?");
            $queryUser->execute([$id]); // отправляем переменные в запрос
        }
        catch (Exception $e) { // иначе ошибка
            echo "Ошибка:" . $e->getMessage() . "<br/>";
        }
    }
    removeUser($dbh, $id);
}


