<?php
session_start();
require_once 'sql_connect.php';

if (isset($_POST['search'])) { // проверка на существование
    $needUser = $_POST['search']; // присваиваем переменную
    $dmp = explode(" ", $needUser); // делаем массив из запроса
    foreach ($dmp as $keys) {
        if (!empty($keys)) { // проверка на пустоту
            // echo $keys;
        } else {
            $error = "Ошибка";
        }
    }
    function seachUser($dbh, $dmp) 
    {
        if (isset($dmp[0]) and isset($dmp[1])) { // проверка на существование
            $surname = $dmp[0];  // присваиваем переменную
            $name = $dmp[1];  // присваиваем переменную

            global $userResult; // создаем глобальную переменную
            global $error; // создаем глобальную переменную
            if ($error != "Ошибка") { // если не ошибка, то 
                if (strlen($surname) and strlen($name) >= 3) { // длинна больше или равна 3-х
                    if (is_string($surname) and is_string($name)) { // проверка на строку 
                        try { // попытка получения нужного пользователя
                            $queryUser = $dbh->prepare("SELECT `users`.`id`,`users`.`surname`,`users`.`name`,`users`.`midname`,`users`.`date`,`pass`,`login`,`idgroup`,`users`.`idrole`,`groups`.`name` as `groupname` FROM `users` left join `groups` on `groups`.`id` = `users`.`idgroup` WHERE `users`.`surname` = ? OR `users`.`name` = ?");
                            $queryUser->execute([$surname, $name]); // отправляем переменные в запрос
                            $userResult[] = $queryUser->fetchAll(PDO::FETCH_ASSOC); // получаем массив
                            // print_r($userResult);
                        } catch (Exception $e) { // иначе ошибка
                            echo "Ошибка:" . $e->getMessage() . "<br/>";
                        }
                        return $userResult;
                    } else {
                        $_SESSION['message'] = "Введите корректные имена в поиске";
                    }
                } else {
                    $_SESSION['message'] = "Слишком короткая поисковая строка";
                }
            } else {
                $_SESSION['message'] = "Ожидание фамилии и имени";
            }
        }
    };
    seachUser($dbh, $dmp);
    // echo $_SESSION['errorMessage'];
}
