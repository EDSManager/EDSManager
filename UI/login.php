<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

if (!empty($_POST)) {

    $sQLogin = $_POST['q_login'];
    $sQPassword = $_POST['q_password'];

    $sError = '';

    if (!preg_match("#^[aA-zZ0-9]+$#",$sQLogin)) {
        $sError = 'В логине недопустимые символы';
    } else if ($sQPassword == '') {
        $sError = 'Пароль не может быть пустым';
    }

    if (empty($sError)) {

        $bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);
        if (!$bLink) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sQuery = "SELECT id FROM users WHERE login = '" . $sQLogin . "' AND password = '" . MD5($sQPassword) . "'";

        $bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());;
        $aRow = mysqli_fetch_row($bResult);
        $iUserId = (int)$aRow[0];

        mysqli_close($bLink);

        if ($iUserId > 0) {

            session_start();
            $_SESSION['userid'] = $iUserId;

            // тут место где надо записать в журнал logins параметры со статусом OK

            header("Location: ./main.php");

        } else {

            $sError = "Неверный логин или пароль";

            // тут место где надо записать в журнал logins параметры со статусом ERROR
        }

    }

//    echo date ('m.d.y H:i:s');
//    echo "<br>";
//    echo "User: ".$login;
//    echo "<br>";
//    echo "Браузер: ".$_SERVER['HTTP_USER_AGENT'];
//    echo "<br>";
//    echo "Remote address: ".$_SERVER['REMOTE_ADDR'];
//    echo "<br>";
//    echo "Status: ";

//    if ($error == '') {
//        echo "OK";
//    } else {
//        echo "Error";
//    };
};
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

     <?php if (isset($sError)) echo '<span style="color: red;">'. $sError .'</span>';
     ?>

                    <p class="submit"><input type="submit" name="commit" value="Войти"></p>
                </form>
            </div>
        </section>
    </body>
</html>