<?php
if (!empty($_POST)) {

    $login = $_POST['q_login'];
    $password = $_POST['q_password'];

    $error = '';

    if (!preg_match("#^[aA-zZ0-9]+$#",$login)) {
        $error = 'В логине недопустимые символы';
    } else if ($password == '') {
        $error = 'Пароль не может быть пустым';
    } else if ($login != 'eds') {
        $error = 'Неверный логин или пароль';
    };

    echo date ('m.d.y H:i:s');
    echo "<br>";
    echo "User: ".$login;
    echo "<br>";
    echo "Браузер: ".$_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo "Remote address: ".$_SERVER['REMOTE_ADDR'];
    echo "<br>";
    echo "Status: ";

    if ($error == '') {
        echo "OK";
    } else {
        echo "Error";
    };


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

<h1>EDSManager</h1>
                <form action="./login.php" method="post" enctype="multipart/form-data">
                    <p><label><input type="text" name="q_login" value="" placeholder="Логин"></label></p>
                    <p><label><input type="password" name="q_password" value="" placeholder="Пароль"></label></p>

                        <?php if (isset($error)):
                            echo '<span style="color: red;">';
                            echo $error;
                            echo '</span>';
                        endif; ?>

                    <p class="submit"><input type="submit" name="commit" value="Войти"></p>
                </form>
            </div>
        </section>
    </body>
</html>