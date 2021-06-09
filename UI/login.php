<?php
if (!empty($_POST)) {

    $login = $_POST['q_login'] ?? '';
    $password = $_POST['q_password'] ?? '';

    if ($login == '' & $password == '') {
        $error = 'Логин и пароль не могут быть пустые';
    } else if ($login != 'eds') {
        $error = 'Неверный логин';
    }

}
?>

<!DOCTYPE html>
<html lang="ru">
<head><title>Вход в EDSManager</title>
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
<p><label>
        <input type="text" name="q_login" value="" placeholder="Логин или Email">
    </label></p>
<p><label>
        <input type="password" name="q_password" value="" placeholder="Пароль">
    </label></p>

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