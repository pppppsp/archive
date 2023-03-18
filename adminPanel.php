<?php
session_start();
require 'include/sql_connect.php';
require 'include/getAllUsers.php';
require 'include/searchUser.php';
require 'include/removeUser.php';

$userRole = $_SESSION['user']['role'];
// var_dump($userRole);
$title = "Панель администратора";

if (!($_SESSION['user'])) {
    header("Location: signup.php");
}

switch ($userRole) {
    case 3:
        header("Location: signup.php");
        break;
    case 2:
        header("Location: signup.php");
        break;
}
// var_dump($allUsers);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require 'blocks/head.php'; ?>
</head>

<body>

    <!-- header start -->

    <? require 'blocks/adminHeader.php'; ?>

    <!-- header end -->


    <!-- content start -->

    <section class="body mt-5">
        <div class="container p-3">

            <!-- Уведомление об местоположении администратора на страничке с правами -->

            <? require './blocks/blocknotifi.php'; ?>

            <!-- Уведомление об местоположении администратора на страничке с правами  конец-->

            <div class="content mt-5">
                <div class="allUsers box">
                    <p class="is-size-5">Все пользователи</p>
                    <div class="allUsers_top">
                        <form action="" method="POST">
                            <input class="search input" type="text" name="search" placeholder="Поиск">
                            <button class="button is-link">Найти</button>
                        </form>
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo "
                    <p class='is-size-6 has-text-danger mt-3' id='errorBlock'>
                            $_SESSION[message]  </p>";
                        };
                        unset($_SESSION['message']);
                        ?>
                        <div class="allUsers_result mt-3">
                            <table>
                                <tr>
                                    <th>id</th>
                                    <th>Фотография</th>
                                    <th>Фамилия</th>
                                    <th>Имя</th>
                                    <th>Отчество</th>
                                    <th>Дата рождения</th>
                                    <th>Роль</th>
                                    <th>Группа</th>
                                    <th>Действие</th>
                                </tr>
                                <!-- echo user start -->
                                <?php
                                if (isset($userResult)) {
                                    foreach ($userResult as $user => $keys) {
                                        foreach ($keys as $bug) {
                                ?>
                                            <!-- вывод пользователя, которого нашли в поиске -->

                                            <? require './blocks/adminSearchUserR.php'; ?>

                                            <!-- вывод пользователя, которого нашли в поиске конец-->

                                        <?php
                                        }
                                    }
                                } else {
                                    foreach ($allUsers as $user) { ?>

                                    <!-- иначе вывод всех пользователей -->

                                    <? require './blocks/adminSAU.php'; ?>

                                    <!-- иначе вывод всех пользователей конец -->
                                        
                                <?php
                                    }
                                }
                                ?>

                            </table>
                            <!-- echo user end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- content end -->




</body>

<script src="assets/js/modal.js"></script>
<script src="assets/js/tree.js"></script>
<script src="assets/js/toremovenotif.js"></script>
<script src="assets/js/adminmenu.js"></script>

</html>