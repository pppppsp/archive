<?php
session_start();
require 'sql_connect.php';
$userid = $_SESSION['user']['id'];

function getDiplomUsers($dbh)
{
    $queryDiplomAll = $dbh->query("SELECT `diplom`.`id` as `diplomid`,`users`.`surname`,`users`.`name`,`users`.`midname`,`diplom`.`theme`,`diplom`.`score`,`groups`.`name` as `groupname`,`year`.`year`,`diplom`.`src`,`users`.`id`,`diplom`.`countpages`, `diplom`.`mark`,`users`.`id` as `userid` from `diplom` left join `users` on `users`.`id` = `diplom`.`iduser` LEFT join `groups` on `groups`.`id` = `users`.`idgroup` left join `year` on `year`.`id` = `groups`.`year_id`");
    $_SESSION['queryDiplomAll'] = $queryDiplomAll->fetchAll(PDO::FETCH_ASSOC);
}
getDiplomUsers($dbh);
// var_dump( $_SESSION['queryDiplomAll']);
if (isset($_SESSION['queryDiplomAll'])) {
    function getCurrentTheme($dbh, $data)
    {
        foreach ($data as $theme => $themes) {
            // var_dump($themes['theme']);
            $queryDiplomAll = $dbh->prepare("SELECT `users`.`surname`,`users`.`name`,`users`.`midname`,`diplom`.`theme`,`groups`.`name` as `groupname`,`year`.`year`,`diplom`.`src` from `diplom` left join `users` on `users`.`id` = `diplom`.`iduser` LEFT join `groups` on `groups`.`id` = `users`.`idgroup` left join `year` on `year`.`id` = `groups`.`year_id` WHERE `diplom`.`theme` = ?");
            $queryDiplomAll->execute([$themes['theme']]);
            $_SESSION['queryDiplomSimilar']= $queryDiplomAll->fetchAll(PDO::FETCH_ASSOC);
            // print_r($_SESSION['queryDiplomSimilar']);
        }
    }
    getCurrentTheme($dbh, $_SESSION['queryDiplomAll']);
}
function getUserD($dbh, $userid)
{
    $queryDiplomUser = $dbh->prepare("SELECT `diplom`.`id` as `diplomid`,`users`.`surname`,`users`.`name`,`users`.`midname`,`diplom`.`theme`,`diplom`.`score`,`groups`.`name` as `groupname`,`year`.`year`,`diplom`.`src`,`users`.`id`, `diplom`.`mark`,`users`.`id` as `userid` from `diplom` left join `users` on `users`.`id` = `diplom`.`iduser` LEFT join `groups` on `groups`.`id` = `users`.`idgroup` left join `year` on `year`.`id` = `groups`.`year_id` WHERE `users`.`id` = ?");
    $queryDiplomUser -> execute([$userid]);
    $_SESSION['getUserD'] = $queryDiplomUser->fetchAll(PDO::FETCH_ASSOC);
    // print_r($_SESSION['queryDiplomAll']);
}
getUserD($dbh, $userid);