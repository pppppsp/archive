<tr>
    <td><? echo $bug["id"]; ?></td>
    <td>
        <img class="userimg" src="./assets/img/personal/avatar.png" alt="avatar.png">
    </td>
    <td><?= $bug['surname']; ?></td>
    <td><?= $bug['name']; ?></td>
    <td><?= $bug['midname']; ?></td>
    <td><?= date('d.m.Y', strtotime($bug['date'])); ?></td>
    <td>
        <?php
        switch ($bug['idrole']) {
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
        switch ($bug['groupname']) {
            case "":
                echo "Неизвестно";
                break;
            case $bug['groupname']:
                echo $bug['groupname'];
                break;
        }
        ?>
    </td>
    <td>
        <div class="user_buttons">
            <?php
            if ($_SESSION['user']['role'] == 4) { ?>
            <?php   } else { ?>
                <a class="button is-danger mr-3" type="submit" href="./adminPanel.php?delete=<?= $bug['id']; ?>">Удалить</a>
            <?php  }
            ?>
            <form action="./adminRemakeUser.php" method="POST">
                <input type="hidden" name="user[]" value="<?= $bug['id']; ?> ">
                <input type="hidden" name="user[]" value="<?= $bug['surname']; ?> ">
                <input type="hidden" name="user[]" value="<?= $bug['name']; ?> ">
                <input type="hidden" name="user[]" value="<?= $bug['midname']; ?> ">
                <input type="hidden" name="user[]" value="<?= $bug['date']; ?>">
                <input type="hidden" name="user[]" value="<?= $bug['login']; ?>">
                <input type="hidden" name="user[]" value="<?= $bug['pass']; ?>">
                <input type="hidden" name="user[]" value="<?= $bug['groupname']; ?>">
                <input type="hidden" name="user[]" value="<?= $bug['idgroup']; ?>">
                <input type="hidden" name="user[]" value="<?= $bug['idrole']; ?> ">
                <button class="edit button is-link">Изменить</button>
            </form>
        </div>
    </td>
</tr>