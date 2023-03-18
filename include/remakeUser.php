<?php
// functions start
session_start();
require 'sql_connect.php';
$userid = $_SESSION['user']['id'];

// получение нужного пользователя.
function getUser($dbh, $userid)
{
    global $user;
    try { // попытка получения нужного пользователя
        $queryUsers = $dbh->prepare("SELECT `users`.`id`,`users`.`surname`,`users`.`name`,`users`.`midname`,`users`.`date`,`users`.`pass`,`users`.`login`,`users`.`idrole`,`users`.`idgroup`,`groups`.`name` as `groupname` FROM `users` left join `groups` on `groups`.`id` = `users`.`idgroup` WHERE `users`.`id` = ?");
        $queryUsers->execute([$userid]);
        $user = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($user);
    } catch (Exception $e) { // иначе ошибка
        echo "Ошибка:" . $e->getMessage() . "<br/>";
        die();
    }
};
getUser($dbh, $userid);
function remakeUser($dbh, $userid, $data, $user)
{
    if (isset($data['old_pass']) and isset($data['new_pass']) and $data['date']) {
        $old_pass = md5($data['old_pass']);
        // var_dump($old_pass);
        $new_pass = md5($data['new_pass']);
        $date = $data['date'];
        // var_dump($user);  
        foreach ($user as $us) {
            if ($old_pass === $us['pass']) {
                if (strlen($new_pass) > 5) {
                    try {
                        $remakeUser = $dbh->prepare("UPDATE `users` SET `date` = ?, `pass` = ? WHERE `users`.`id` = ?");
                        $remakeUser->execute([$date, $new_pass, $userid]);
                        $_SESSION['message'] = "Готово";
                    } catch (Exception $e) {
                        echo "Ошибка:" . $e->getMessage() . "<br/>";
                        die();
                    }
                } else {
                    $_SESSION['message'] = "Новый пароль должен быть больше пяти символов";
                }
            } else {
                $_SESSION['message'] = "Введите корректный старый пароль";
            }
        }
    }

    if (isset($_SESSION['message'])) {
        $text = $_SESSION['message'];
        $text = explode(" ", $text);
        // var_dump($text[0]);
        switch ($text[0]) {
            case 'Введите':
                $_SESSION['color'] = "has-text-link";
                break;
            case 'Новый':
                $_SESSION['color'] = "has-text-danger";
                break;
            case 'Готово':
                $_SESSION['color'] = "has-text-success";
                break;
        }
    }
}

remakeUser($dbh, $userid, $_POST, $user);
