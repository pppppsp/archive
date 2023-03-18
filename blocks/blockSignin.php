<div class="container">
    <div class="login">
        <form class= "form box p-4" action="include/signin.php" method="post" enctype="multipart/form-data">
            <p class = "has-text-centered is-size-5 mb-4">Добро пожаловать!</p>
            <input class = "input" type = "text" name = "login" placeholder = "Логин" required><br>
            <input class = "input mt-2" type = "password" name = "pass" placeholder = "Пароль" required><br>
            <?php
                if (isset($_SESSION['message'])) {
                    echo "
                    <p class='is-size-6 has-text-centered has-text-danger mt-3' id='errorBlock'>
                            $_SESSION[message]  </p>";
                };
                unset($_SESSION['message']);
                ?>
            <button class = "button is-link mt-3" style = "margin:0 auto; display:block;">Войти</button>
            <p class="is-size-6 mt-3">
            У Вас нет аккаунта? - <a class="has-text-link is-size-6" href="signup.php" >зарегистрироваться</a>
            </p>
        </form>
    </div>
</div>