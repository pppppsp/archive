<?php
session_start();
if (!($_SESSION['user'])) {
    header("Location: signup.php");
}
$title = "Проверка на плагиат";
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

    <!-- plagiat start -->

    <? require 'blocks/plagiatform.php'; ?>
    
    <!-- plagiat end -->

    <!-- footer start -->

    <? require 'blocks/footer.php'; ?>

    <!-- footer end -->
</body>
<script src="assets/js/uploadfile.js"></script>

</html>