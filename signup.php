<?php 
    session_start();
    if(isset($_SESSION['user'])) { 
        header('Location: person.php');
    } 
    $title = "Регистрация";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require 'blocks/head.php'; ?>
</head>

<body>
    <!-- header start -->

    <? require 'blocks/header.php'; ?>

    <!-- header end -->

    <!-- regist start -->

    <? require 'blocks/blockSignup.php'; ?>

    <!-- regist end -->

    <!-- footer start -->

    <? require 'blocks/footer.php'; ?>

    <!-- footer end -->
</body>

</html>