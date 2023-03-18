<div class="container mt-6">

    <div class="is-flex is-justify-content-space-evenly is-flex-wrap-wrap" style="min-height:500px;">
        <figure class=" is-rounded" style="height:400px;">
            <img width="400px" class="is-rounded box" src="./assets/img/personal/avatar.png" alt="avatar">
        </figure>
        <div class="user_info ml-2">
            <p class="is-size-5 mt-4"><?= $_SESSION['user']['surname'] . " " . $_SESSION['user']['name']; ?></p>
            <p class="is-size-5 mt-2"> <?= "Дата рождения: " . date('d.m.Y', strtotime($_SESSION['user']['date'])); ?></p>
            <p class="is-size-5 mt-2"><?= 'Группа: ' . $user['groupname']; ?></p>
            <p class="is-size-5 mt-2">
                <?php
                switch ($userRole) {
                    case 1:
                        echo "Вы: <span class = 'p-2 is-size-5 button is-warning is-light '>Администратор</span";
                        break;
                    case 2:
                        echo "Вы: <span class = 'p-2 is-size-5 button is-success is-light '>Руководитель</span";
                        break;
                    case 3:
                        echo "Вы: <span class = 'p-2 is-size-5 button is-info is-light '>Студент</span";
                        break;
                    case 4:
                        echo "Вы: <span class = 'p-2 is-size-5 button is-danger is-light '>Модератор</span";
                        break;
                }
                ?>
            </p>

        </div>
        <?php
        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 4) {
        ?>
            <div class="setings is-flex is-flex-direction-column">
                <p class="is-size-5">Меню администратора</p>
                <a class="button-setings is-size-5 mt-2" href="settingsAccount.php">Настройки аккаунта</a>
                <a class="is-size-5 mt-2" href="anti.php">Проверить диплом</a>
                <a class="is-size-5 mt-2 button <? if ($_SESSION['user']['role'] == 1) echo 'is-warning';
                                                else echo 'is-danger'; ?> is-light" href="adminPanel.php">Админка</a>
            </div>
        <?php
        } else {
        ?>
            <div class="setings is-flex is-flex-direction-column">
                <p class="is-size-5">Меню пользователя</p>
                <a class="is-size-5 mt-2" href="settingsAccount.php">Настройки аккаунта</a>
                <a class="is-size-5 mt-2" href="anti.php">Проверить диплом</a>
            </div>
        <?php
        }
        ?>
    </div>

</div>