<?php
if ($moderRole == $accountRole and $_POST['user'][9] == 1) { ?> // нужно доделать
    <input class="input input_edit" type="text" name="user[]" placeholder="Фамилия" readonly value="<? echo $_POST['user'][1]; ?>"><br>
    <input class="input input_edit mt-2" type="text" name="user[]" placeholder="Имя" readonly value="<? echo $_POST['user'][2]; ?>"><br>
    <input class="input input_edit mt-2 mb-2" type="text" name="user[]" placeholder="Отчество" readonly required value="<? echo $_POST['user'][3]; ?>"><br>
<?php } else { ?>
    <div class="box_edit is-flex mt-3 mr-3 is-flex-direction-column is-justify-content-center">
        <label for="surname">Фамилия</label>
        <input class="input input_edit" type="hidden" name="user[]" placeholder="Фамилия" required value="<? echo $_POST['user'][0]; ?>">
        <input class="input  mt-2 mb-2 input_edit" type="text" name="user[]" placeholder="Фамилия" id="surname" required value="<? echo $_POST['user'][1]; ?>">
        <label for=name">Имя</label>
        <input class="input mt-2 mb-2 input_edit " type="text" name="user[]" placeholder="Имя" id="name" required value="<? echo $_POST['user'][2]; ?>">
        <label for="midname">Отчество</label>
        <input class="input mt-2 mb-2 input_edit" type="text" name="user[]" placeholder="Отчество" id="midname" required value="<? echo $_POST['user'][3]; ?>">
    </div>
    <div class="box_edit is-flex mt-3 mr-3 is-flex-direction-column is-justify-content-center">
        <label for="date">Дата рождения</label>
        <input class="input  mt-2 mb-2 input_edit" type="date" name="user[]" required value="<? echo $_POST['user'][4]; ?>">
        <label for="login">Логин</label>
        <input class="input mt-2 mb-2 input_edit" type="text" name="user[]" placeholder="Логин" required value="<? echo $_POST['user'][5]; ?>">
        <label for="date">Пароль</label>
        <input class="input input_edit mt-2 mb-2" type="password" name="user[]" placeholder="Пароль" required value="<? echo $_POST['user'][6]; ?>">
    </div>
    <div class="box_edit is-flex mt-3 is-flex-direction-column is-justify-content-space-around">
        <label for="date">Группа: <? echo $_POST['user'][7]; ?>, ID группы: <? echo $_POST['user'][8]; ?></label>
        <div class="select-block mt-2 mb-2 is-normal ">
            <select name="user[]">
                <?php
                foreach ($resultGroup as $group) { ?>
                    <option value="<? echo $group['id']; ?>"><? echo $group['name']; ?></option>
                <?php    }
                ?>
            </select>
        </div>
    <?php  }
    ?>
    <label for="date">Роль:
        <?php
        switch ($resultRoles[0]["id"]) {
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
        , ID роли: <? echo $_POST['user'][9]; ?></label>

    <?php
    if ($moderRole == $accountRole and $_POST['user'][9] == 1 || $_SESSION['user']['role'] == 4) {
    } else { ?>
        <div class="select-block is-link mt-2">
            <select name="user[]">
                <?php
                foreach ($resultRolList as $role) {
                ?>
                    <option value="<? echo $role['id']; ?>"><? echo $role['name']; ?></option>
                <?php    }
                ?>
            </select>
        </div>
    <?php  }
    ?>
    <?php
    if ($moderRole == $accountRole and $_POST['user'][9] == 1) { ?>
    <?php    } else {
    ?>
        <button class="button is-link mt-5">Изменить</button>
    <?php
    }
    ?>
    </div>