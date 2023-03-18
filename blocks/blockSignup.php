<div class="min_height container">
    <div class="login">
        <form class= "form box p-6" action="include/signup.php" method="post" enctype="multipart/form-data">
            <p class = "has-text-centered is-size-5 mb-4">Регистрация</p>
            <input class = "input " type = "text" name = "surname" placeholder = "Фамилия" required><br>
            <input class = "input  mt-2" type = "text" name = "name" placeholder = "Имя" required><br>
            <input class = "input  mt-2" type = "text" name = "midname" placeholder = "Отчество" required><br>
            <label for="date">Дата рождения</label>
            <input class = "input  mt-2" type = "date" name = "date" placeholder = "Логин" required><br>
            <input class = "input  mt-2 mt-2" type = "text" name = "login" placeholder = "Логин" required><br>
            <input class = "input  mt-2 mt-2" type = "password" name = "pass" placeholder = "Пароль" required><br>
            <input class = "input  mt-2 mt-2" type = "password" name = "conf_pass" placeholder = "Подтвердите пароль" required><br>
            <?php
                if (isset($_SESSION['message'])) {
                    echo "
                    <p class='is-size-6 has-text-centered has-text-danger mt-3' id='errorBlock'>
                            $_SESSION[message]  </p>";
                };
                unset($_SESSION['message']);
                ?>
            <button class = "button is-link mt-3" style = "margin:0 auto; display:block;">Создать аккаунт</button>
            <p class="is-size-6 mt-3 has-text-centered">
            Уже есть аккаунт? - <a class="has-text-link" href="signin.php" >войти</a>
            </p>
        </form>
    </div>
</div>