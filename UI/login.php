<?php

    require_once ('../approot.inc.php');

    use \EDSManager\Classes\DB;

    if (!empty($_POST)) {

        $sQLogin = $_POST['q_login'];
        $sQPassword = $_POST['q_password'];
        $sIpAddres = $_SERVER['REMOTE_ADDR'];
        $sBrowser = $_SERVER['HTTP_USER_AGENT'];

        $sError = '';


        if (!preg_match("#^[aA-zZ0-9]+$#",$sQLogin)) {
            $sError = 'В логине недопустимые символы';
        } else if ($sQPassword == '') {
            $sError = 'Пароль не может быть пустым';
        }

        $sQPassword = md5($sQPassword);

        if (empty($sError)) {

            $db = new DB();
            $sQuery = 'SELECT id FROM users WHERE login = :login AND password = :password';
            $sParams = array(':login' => $sQLogin, ':password' => $sQPassword);
            $aResult = $db->query($sQuery, $sParams);

            if ($aResult != []) {
                $iUserId = (int)$aResult[0]['id'];
            } else $iUserId = 0;

            if ($iUserId > 0) {

                session_start();
                $_SESSION['userid'] = $iUserId;

                $sQuery = "INSERT INTO logins ( date, ip, login, browser, status) VALUES (NOW(), :ip, :login, :browser, :status)";
                $sParams = [':ip' => $sIpAddres, ':login' => $sQLogin, ':browser' => $sBrowser, ':status' => 'OK'];
                $aResult = $db->query($sQuery, $sParams);

                header("Location: ./main.php");

            } else {
                $sError = 'Неверный логин или пароль';

                $sQuery = "INSERT INTO logins ( date, ip, login, browser, status) VALUES (NOW(), :ip, :login, :browser, :status)";
                $sParams = [':ip' => $sIpAddres, ':login' => $sQLogin, ':browser' => $sBrowser, ':status' => 'ERROR'];
                $aResult = $db->query($sQuery, $sParams);

            }
        }
    }


?>

<!DOCTYPE html>
    <html lang="ru">
    <head>
        <title>Вход в EDSManager</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <section class="container">
            <div id="headerInner">
                <div class="logo">
                    <a href="../">EDS Manager</a>
                </div>
            </div>

            <div class="login">
                <h1>Вход в EDSManager</h1>
                <form action="./login.php" method="post" enctype="multipart/form-data">
                    <p><label><input type="text" name="q_login" value="" placeholder="Логин"></label></p>
                    <p><label><input type="password" name="q_password" value="" placeholder="Пароль"></label></p>

                    <?php
                        if (isset($sError)) {
                            echo '<span style="color: red;">'. $sError .'</span>';
                        }
                    ?>

                    <p class="submit"><input type="submit" name="commit" value="Войти"></p>
                </form>
            </div>
        </section>
    </body>
</html>