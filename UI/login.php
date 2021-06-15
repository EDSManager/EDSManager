<?php

    require_once ('../setup/database.php');
    require_once ('../approot.inc.php');
    require_once (CONFIG_FILE);

    if (!empty($_POST)) {

        $sQLogin = $_POST['q_login'];
        $sQPassword = $_POST['q_password'];
        date_default_timezone_set("Europe/Moscow");
        //$dateLogin = date ("d:m:y H:i:s");
        $ipAddres = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];

        $sError = '';

        if (!preg_match("#^[aA-zZ0-9]+$#",$sQLogin)) {
            $sError = 'В логине недопустимые символы';
        } else if ($sQPassword == '') {
            $sError = 'Пароль не может быть пустым';
        }

        if (empty($sError)) {

            //Получаем уникальный идентификатор пользователя
            $sQuery = "SELECT id FROM users WHERE login = '" . $sQLogin . "' AND password = '" . MD5($sQPassword) . "'";
            $selectResult = mysqli_query($linkDatabase, $sQuery);
            $aRow = mysqli_fetch_row($selectResult);

            //Определение идентификатора пользователя
            $iUserId = $aRow != null ? (int)$aRow[0] : 0;

            if ($iUserId > 0) {

                session_start();
                $_SESSION['userid'] = $iUserId;

                $insertQuery = "INSERT INTO logins (`date`, `ip`, `login`, `browser`, `status`) VALUES ( NOW(), '" . $ipAddres . "', '" .$sQLogin . "', '" . $browser . "', 'ok')";
                $insertResult = mysqli_query($linkDatabase, $insertQuery);
                header("Location: ./main.php");

            } else {
                $sError = 'Неверный логин или пароль';
                $insertQuery = "INSERT INTO logins (`date`, `ip`, `login`, `browser`, `status`) VALUES ( NOW(), '" . $ipAddres . "', '" .$sQLogin . "', '" . $browser . "', 'error')";
                $insertResult = mysqli_query($linkDatabase, $insertQuery);
            }
        }
    }

    mysqli_close($linkDatabase);

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
                    <a href="/">EDS Manager</a>
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