<div class="container">
    <div class="table-content  mt-3  box " style="<? //if ($keys['score'] == "Зачтено") echo 'display:none;';
                                                    //else echo 'display:block'; 
                                                    ?>">

        <p class="is-size-5"><? echo $keys['surname'] . " " . $keys['name']; ?></p>
        <table class="user_info-table" style="width:100%;">
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
                <td class="has-text-centered"><? echo $keys['mark']; ?></td>
                <td class="user_info-table-cell"><? echo $keys['year']; ?></td>
                <td class="user_info-table-cell">
                    <div class="diplom_buttons is-flex">
                        <a class="is-size-6 mr-2" href="include/download.php?download=<?php echo $keys['src']; ?>">Скачать</a>
                        <a class="is-size-6 has-text-danger mr-2" href="include/removeDiplom.php?delete=<?php echo $keys['diplomid']; ?>">Удалить</a>
                        <form class="mr-2 is-flex" action="include/approvedStatusDiplom.php" method="POST">
                            <input type="hidden" name="diplom[]" value="<? echo $keys['diplomid']; ?>">
                            <?php
                            if ($keys['score'] == "Одобрено") { ?>
                                <div class="select-block mt-2 mr-2 is-normal ">
                                    <select name="diplom[]">
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <p class="mt-2 mr-2 is-size-6">Нет</p>
                            <?php   }
                            ?>

                            <button class="button mt-2" type="submit">
                                <span class="icon has-text-success">
                                    <i class="fas fa-check-square"></i>
                                </span>
                            </button>
                        </form>
                        <form action="include/notApprovedD.php" method="POST">
                            <input type="hidden" name="diplom" value="<? echo $keys['diplomid']; ?>">
                            <button class="button mt-2">
                                <span class="icon has-text-danger">
                                    <i class="fas fa-ban"></i>
                                </span>
                            </button>
                        </form>

                    </div>
                </td>
            </tr>

        </table>

        <p class="is-size-6 mt-2">Похожие темы</p>
        <div class="approvedThemes">
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
                    // var_dump($sim['theme']);
                    if ($keys['theme'] === $sim['theme']) {
                ?>
                        <tr>
                            <td class=" user_info-table-cell has-text-danger"><? echo $sim['surname']; ?></td>
                            <td class=" user_info-table-cell has-text-danger "><? echo $sim['name']; ?></td>
                            <td class=" user_info-table-cell has-text-danger "><? echo $sim['midname']; ?></td>
                            <td class=" user_info-table-cell has-text-danger "><? echo $sim['groupname']; ?></td>
                            <td class=" user_info-table-cell has-text-danger "><? echo $sim['theme']; ?></td>
                            <td class=" user_info-table-cell has-text-danger "><? echo $sim['year']; ?></td>
                            <td class=" user_info-table-cell has-text-danger ">
                                <div class="diplom_buttons">
                                    <a href="include/download.php?download=<?php echo $sim['src']; ?>">Скачать</a>
                                </div>
                            </td>
                        </tr>
                <?php
                    } else {
                    }
                }

                ?>
            </table>
        </div>

        <!-- echo user end -->
    </div>
</div>