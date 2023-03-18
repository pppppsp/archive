<div class="table-content mt-3  box ">

    <p class="is-size-5"><? echo $keys['surname'] . " " . $keys['name']; ?></p>
    <table class="user_info-table">
        <tr>
            <th>Фотография</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Группа</th>
            <th>Тема</th>
            <th>Статус</th>
            <th>Оценка</th>
            <th>Год</th>
            <th>Действие</th>
        </tr>

        <tr>
            <td class="user_info-table-cell"><img class="userimg" src="./assets/img/personal/avatar.png" alt="avatar.png"></td>
            <td class="user_info-table-cell"><? echo $keys['surname']; ?></td>
            <td class="user_info-table-cell"><? echo $keys['name'] ?></td>
            <td class="user_info-table-cell"><? echo $keys['midname']; ?></td>
            <td class="user_info-table-cell"><? echo $keys['groupname']; ?></td>
            <td class="user_info-table-cell"><? echo $keys['theme']; ?></td>
            <td class="user_info-table-cell">
                <?php
                // var_dump($keys['score']);
                switch ($keys['score']) {
                    case "":
                        echo 'Неизвестно';
                        break;
                    case "Одобрено":
                        echo 'Одобрено';
                        break;
                    case "Нет":
                        echo 'Не зачтено';
                        break;
                }
                ?></td>
            <td class="user_info-table-cell has-text-centered"><? echo $keys['mark']; ?></td>
            <td class="user_info-table-cell"><? echo $keys['year']; ?></td>
            <td class="user_info-table-cell">
                <?php
                if ($_SESSION['user']['role'] == 3 || $_SESSION['user']['role'] == 4) { ?>
                    <a class="mr-2" href="include/download.php?download=<?php echo $keys['src']; ?>">Скачать</a>
                    <a class="is-size-6 has-text-danger" href="include/removeDiplom.php?delete=<?php echo $keys['diplomid']; ?>">Удалить</a>
                <?php } else { ?>
                    <div class="diplom_buttons is-flex">
                        <a class="mr-2" href="include/download.php?download=<?php echo $keys['src']; ?>">Скачать</a>
                        <form class="mr-2" action="include/approvedStatusDiplom.php" method="POST">
                            <input type="hidden" name="diplom" value="<? echo $keys['id']; ?>">
                            <button class="button" type="submit">
                                <span class="icon has-text-success">
                                    <i class="fas fa-check-square"></i>
                                </span>
                            </button>
                        </form>
                        <form action="include/notApprovedD.php" method="POST">
                            <input type="hidden" name="diplom" value="<? echo $keys['id']; ?>">
                            <button class="button">
                                <span class="icon has-text-danger">
                                    <i class="fas fa-ban"></i>
                                </span>
                            </button>
                        </form>

                    </div>
                <?php  }
                ?>

            </td>
        </tr>

    </table>

    <p class="is-size-6">Похожие темы</p>
    <table class="table">
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Группа</th>
            <th>Тема</th>
            <th>Год</th>
            <th>Действие</th>
        </tr>
        <?php
        foreach ($_SESSION['queryDiplomSimilar'] as $diplomsimilar => $sim) {
            if ($keys['theme'] == $sim['theme']) {
        ?>
                <tr>
                    <td class="has-text-danger"><? echo $sim['surname']; ?></td>
                    <td class="has-text-danger "><? echo $sim['name']; ?></td>
                    <td class="has-text-danger "><? echo $sim['midname']; ?></td>
                    <td class="has-text-danger "><? echo $sim['groupname']; ?></td>
                    <td class="has-text-danger "><? echo $sim['theme']; ?></td>
                    <td class="has-text-danger "><? echo $sim['year']; ?></td>
                    <td class="has-text-danger ">
                        <?php
                        if ($userRole = 3) {
                            echo 'Нет прав.';
                        } else { ?>
                            <div class="diplom_buttons">
                                <a href="include/download.php?download=<?php echo $sim['src']; ?>">Скачать</a>
                            </div>
                        <?php }
                        ?>
                    </td>
                </tr>
        <?php
            } else {
                echo "";
            }
        }
        ?>
    </table>
    <!-- echo user end -->
</div>