<header class="has-background-dark">
    <div class="container p-3 is-flex is-align-items-center is-justify-content-space-between">
        <div>
            <p class="has-text-light has-text-weight-semibold is-size-5 is-uppercase">Админ Панель</p>
        </div>
        <div class="first is-flex is-align-items-center">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a class="button is-warning is-size-6" href="person.php">Личный кабинет</a>
                <a class="button is-danger is-size-6 ml-2" href="include/logout.php">Выход</a>
            <?php
            } else {
            ?>
                <a class="signup button is-info is-size-6 mr-2" href="signin.php">Вход</a>
            <?php
            }
            ?>

        </div>
    </div>
</header>