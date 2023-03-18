<section class="plagiat container p-2">
    <div class="protect box">
        <p class="text is-size-4">Проверка дипломов</p>
        <form class="protect is-flex is-flex-direction-column is-justify-content-space-between" action="include/plagiat.php" method="POST" enctype="multipart/form-data">
            <input class="input mt-2" type="text" name="theme" placeholder="Тема диплома">
            <input class="input mt-2" type="text" name="countpages" placeholder="Количество листов">

            <div id="file-js-example" class="file has-name <?php if ($_SESSION['user']['role'] == 1) echo 'is-warning';
                                        else echo 'is-link'; ?> mt-3 is-info">
                <label class="file-label">
                    <input class="file-input" type="file" name="document">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Выбрать
                        </span>
                    </span>
                    <span class="file-name">
                        Не загружено
                    </span>
                </label>
            </div>
            <?php
            if (isset($_SESSION['message'])) {
                echo "
                <p class='is-size-6 has-text-centered has-text-danger mt-3' id='errorBlock'>
                        $_SESSION[message]  </p>";
            };
            unset($_SESSION['message']);
            ?>
            <button class="button but-protect is-link mt-3" type="submit">Отправить на проверку</button>
        </form>
    </div>
</section>