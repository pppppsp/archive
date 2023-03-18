<?php

session_start();
require 'sql_connect.php';

function getUsers($dbh)
{
    global $allUsers;
    try { // попытка получения нужного пользователя
        $queryUsers = $dbh->prepare("SELECT `users`.`id`,`users`.`surname`,`users`.`name`,`users`.`midname`,`users`.`date`,`users`.`pass`,`users`.`login`,`users`.`idrole`,`users`.`idgroup`,`groups`.`name` as `groupname` FROM `users` left join `groups` on `groups`.`id` = `users`.`idgroup`");
        $queryUsers->execute([]);
        $allUsers = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($user);
    } catch (Exception $e) { // иначе ошибка
        echo "Ошибка:" . $e->getMessage() . "<br/>";
        die();
    }
};

getUsers($dbh);