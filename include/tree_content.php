<?php 
require 'sql_connect.php';

//нужно просто собрать объект, запоковать его в объект и преобразовать в json
/////////////////////////
$sql = 'SELECT d.id, d.theme, d.countpages, d.score, d.src, u.surname, u.name, u.midname, d.iduser, u.idgroup FROM `users` as u LEFT JOIN `diplom` as d on u.id = d.iduser WHERE u.id = :id';
$id = $_GET['id'];
$query = $dbh->prepare($sql);
$query->execute(['id' => $id]);
$diplom = $query->fetch(PDO::FETCH_OBJ);

echo json_encode($diplom);
//////////////////////////
?>