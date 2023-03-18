<header>
    <div class="container">
        <div class="is-flex is-justify-content-space-between is-align-content-center align-self-center mt-6">
            <div class="block_site first is-flex is-align-items-center">
                <p class="text is-size-5 is-flex is-align-items-center">
                    <a href="https://almetpt.ru">
                        <img src="assets/img/logo.png" style="height:100px; min-width:50px;" alt="logo">
                    </a> 
                    <a class="name_site has-text-dark" href="index.php"> Архив </a></p>
            </div>

            <div class="kabinet_lc first is-flex is-align-items-center">
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <p class="username is-size-5 mt-3 mr-3"><? echo "Привет, " . $_SESSION['user']['name'] . "!" ?></p>
                    <a class="buttin_lc button <?php if ($_SESSION['user']['role'] == 1) echo 'is-warning';
                                        else echo 'is-link'; ?> is-size-6" href="person.php">Личный кабинет</a>
                    <a class="buttin_lc button is-danger is-size-6 ml-2" href="include/logout.php">Выход</a>
                <?php
                } else {
                ?>
                    <a class="buttin_lc signup button is-info is-size-6 mr-2" href="signin.php">Вход</a>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</header>