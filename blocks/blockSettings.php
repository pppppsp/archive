<section class="seting">
    <div class="container">
        <p class="is-size-5 mb-4">Смена данных аккаунта</p>
        <div class="setinformat">
            <form action="" method="POST">
                <input class="input mb-2" type="text" name="" id="" value="<?= $_SESSION['user']['surname'] . $_SESSION['user']['name'] . $_SESSION['user']['midname']; ?>" readonly>
                <label for="date">Дата рождения</label>
                <input class="input mt-2 mb-2" type="date" name="date" id="date" value="<?=$_SESSION['user']['date']; ?>">
                <label for="pass">Старый пароль</label>
                <input class="input mt-2 mb-2" type="password" name="old_pass" id="pass">
                <label for="new_pass">Новый пароль</label>
                <input class="input mt-2 mb-2" type="password" name="new_pass" id="pass">
                <?php

                if (isset($_SESSION['message'])) {
                ?>
                    <p class=" is-size-5 <? echo $_SESSION['color']; ?>"><? echo $_SESSION['message']; ?></p>
                <?php
                    unset($_SESSION['message']);
                };
                ?>
                <button class="button is-link mt-3" type="submit">Сменить данные</button>
            </form>
        </div>
    </div>
</section>