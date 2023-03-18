<?php
session_start();
require 'include/sql_connect.php';
require 'include/getDiplomUsers.php';
// require_once 'include/allusers.php';
if (!($_SESSION['user'])) {
    header("Location: signup.php");
}
$title = "Личный кабинет";
$userid = $_SESSION['user']['id'];
$userRole = $_SESSION['user']['role'];
$user = mysqli_query($connect, "SELECT `users`.`id`,`users`.`surname`,`users`.`name`,`users`.`midname`,`users`.`date`,`users`.`pass`,`users`.`login`,`users`.`idrole`,`users`.`idgroup`,`groups`.`name` as `groupname` FROM `users` left join `groups` on `groups`.`id` = `users`.`idgroup` WHERE `users`.`id` = '$userid'");
$user = mysqli_fetch_assoc($user); // получение данных пользователя



$dataUsers = "SELECT u.id as u_id, u.surname, u.name, u.midname, u.idgroup, g.id, g.name as g_name, g.course, y.year, o.id as o_id, o.name as o_name, d.id as d_id FROM `otdelenie` as o LEFT JOIN `groups` as g on o.id = g.otdelenie_id LEFT JOIN `year` as y on g.year_id = y.id LEFT JOIN `users` as u on g.id = u.idgroup LEFT JOIN `diplom` as d on u.id = d.iduser WHERE d.id IS NOT NULL"; // массив, в котором данные об пользовательских дипломах и в каких группах они состоят.
$query = $connect->query($dataUsers); //  получаем результат 

$result = array();
while ($row = mysqli_fetch_array($query)) {
    $result[$row["o_name"]][$row["year"]][$row["g_name"]][] = $row;
}
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

    <!-- personal start -->

    <? require './blocks/blockPersonal.php'; ?>

    <!-- personal end -->

    <!-- tree start -->

    <? require './blocks/treeDiplom.php'; ?>

    <!-- tree end -->

    <!-- diplom start -->

    <div class="container mt-4">
        <p class="is-size-5">
            <?php
            switch ($userRole) {
                case 1:
                    echo 'Меню';
                    break;
                case 2:
                    echo 'Меню руководителя';
                    break;
                case 3:
                    echo 'Меню студента';
                    break;
                case 4:
                    echo 'Меню модератора';
                    break;
            }
            ?>

        </p>
        <?php
        if ($userRole = 3) {
            echo "";
        } else { ?>
            <form class="mt-3" action="" method="POST">
                <input class="search input" type="text" name="search" placeholder="Поиск">
                <button class="button is-link">Найти</button>
            </form>
        <?php }
        ?>

        <?php
        if (isset($_SESSION['message'])) {
            echo "
                    <p class='is-size-5 has-text-danger mt-3' id='errorBlock'>
                            $_SESSION[message]  </p>";
        };
        unset($_SESSION['message']);
        ?>
        
                   <?php
        if ($_SESSION['user']['role'] == 2) { ?>
            <div class = "list-diploms">
        <?php    foreach ($_SESSION["queryDiplomAll"] as $value => $keys) {
        ?>
                <!-- block diplom start -->
                <? require './blocks/blockDiplom.php'; ?>
                <!-- block diplom end -->
            <?php
            }
            ?>
        </div>
            <?php } else {
            if (empty($_SESSION["getUserD"])) {
            ?>
                <p class="is-size-5 mt-2">Пока нет темы, но ты попробуй отправить! =)</p>
            <?php
            } else { ?>
                <div class="list-diploms p-5 mt-4">
                    <?php
                    if ($_SESSION['user']['role'] == 3 || $_SESSION['user']['role'] == 4) {
                        foreach ($_SESSION["getUserD"] as $value => $keys) { ?>

                            <!-- block user diplom start -->

                            <? require './blocks/blockUserDiplom.php'; ?>

                            <!-- block user diplom end -->

                        <?php   }
                    } else {

                        foreach ($_SESSION["queryDiplomAll"] as $value => $keys) {
                        ?>
                            <!-- teacher block diplom menu start -->

                            <? require './blocks/teacherBlockDiplom.php';?>

                            <!-- teacher block diplom menu end -->
                    <?php
                        }
                    }
                    ?>

                </div>
            <?php  }
            ?>
        <?php }
        ?>

 


    </div>

    <!-- diplom end -->


    <!-- footer start -->

    <? require 'blocks/footer.php'; ?>

    <!-- footer end -->
</body>
<script type="text/javascript" src="./assets/js/compiled.min.js"></script>
<script>
    $(document).ready(function() {
        $('.treeview').mdbTreeview();
    });

    async function getDiplomInfo(userId) {
        const content = document.querySelector('.treeview-content');
        content.innerHTML = `<div class="card mb-4">
                            <div class="card-body">
                                <p class="card-text">Загрузка...</p>
                            </div>
                        </div>`;
        content.innerHTML = ``;
        let res = await fetch(`./include/tree_content.php?id=${userId}`);
        let diplom = await res.json();
        //очищаем область контента, чтобы убрать загрузку и избежать различных багов 

        //обновляем содержимое области контента, подменив разметку в доме
        content.innerHTML +=
            `<div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">${diplom.surname} ${diplom.name} ${diplom.midname}</h4>
                <h5 class="card-title">Тема диплома:${diplom.theme}</h5>
                <p class="card-text">Кол-во страниц: ${diplom.countpages}</p>
                <p class="card-text">Ссылка: <a class = "is-size-6" href = include/download.php?download=${diplom.src} title="Скачать">скачать</a></p>
                <a class = "is-size-6" href="#" class="card-link">подробнее</a>
                <a class = "is-size-6" href="#" class="card-link" onclick="" id="btnRemovePost">удалить</a>
            </div>
        </div>`
    }
</script>

</html>