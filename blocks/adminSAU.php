<tr>
    <td><?= $user['id']; ?></td>
    <td>
        <img class="userimg" src="./assets/img/personal/avatar.png" alt="avatar.png">
    </td>
    <td><?= $user['surname']; ?></td>
    <td><?= $user['name']; ?></td>
    <td><?= $user['midname']; ?></td>
    <td><?= date('d.m.Y', strtotime($user['date'])); ?></td>
    <td>
        <?php
        switch ($user['idrole']) {
            case 1:
                echo "<span class = 'p-2 is-size-6 button is-warning is-light '>Администратор</span>";
                break;
            case 2:
                echo "<span class = 'p-2 is-size-6 button is-success is-light '>Руководитель</span>";
                break;
            case 3:
                echo "<span class = 'p-2 is-size-6 button is-info is-light '>Студент</span>";
                break;
            case 4:
                echo "<span class = 'p-2 is-size-6 button is-danger is-light '>Модератор</span>";
                break;
        }
        ?>
    </td>
    <td>
        <?php
        switch ($user['groupname']) {
            case "":
                echo "Неизвестно";
                break;
            case $user['groupname']:
                echo $user['groupname'];
                break;
        }
        ?>
    </td>
    <td>
        <div class="user_buttons">
            <?php
            if ($_SESSION['user']['role'] == 4) { ?>
            <?php   } else { ?>
                <a class="button is-danger mr-3" type="submit" href="./adminPanel.php?delete=<?= $user['id']; ?>">Удалить</a>
            <?php  }
            ?>
            <form action="./adminRemakeUser.php" method="POST">
                <input type="hidden" name="user[]" value="<?= $user['id']; ?> ">
                <input type="hidden" name="user[]" value="<?= $user['surname']; ?> ">
                <input type="hidden" name="user[]" value="<?= $user['name']; ?> ">
                <input type="hidden" name="user[]" value="<?= $user['midname']; ?> ">
                <input type="hidden" name="user[]" value="<?= $user['date']; ?>">
                <input type="hidden" name="user[]" value="<?= $user['login']; ?>">
                <input type="hidden" name="user[]" value="<?= $user['pass']; ?>">
                <input type="hidden" name="user[]" value="<?= $user['groupname']; ?>">
                <input type="hidden" name="user[]" value="<?= $user['idgroup']; ?>">
                <input type="hidden" name="user[]" value="<?= $user['idrole']; ?> ">
                <button class="edit button is-link">Изменить</button>
            </form>
        </div>
    </td>

</tr>