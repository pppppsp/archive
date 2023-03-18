<?php


$connect = mysqli_connect("localhost", "nicecuwg_archive", "1cfkfdfnufqabtd@","nicecuwg_archive");
if(!$connect) {
    die('error 404');
}

$dbh = new PDO('mysql:host=localhost;dbname=nicecuwg_archive', 'nicecuwg_archive', '1cfkfdfnufqabtd@');