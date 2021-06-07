<?php

session_start();

if (isset ($_SESSION["userid"])) {

    header("Location: ./main.php");

}
else {

    echo "<!DOCTYPE html>";
    echo "<head><title>Вход в EDSManager</title>";
    echo '<meta charset="utf-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';

    echo '<link rel="stylesheet" href="../css/style.css">';
    echo "</head>";

echo "<body>";
  echo '<section class="container">';

echo '<div id="headerInner">';
echo '<div class="logo">';
echo '<a href="/">EDS Manager</a>';
echo '</div>';
echo '</div>';

    echo '<div class="login">';
      echo "<h1>EDSManager</h1>";
      echo '<form action="check_user.php" method="post" enctype="multipart/form-data">';
        echo '<p><input type="text" name="q_login" value="" placeholder="Логин или Email"></p>';
        echo '<p><input type="password" name="q_password" value="" placeholder="Пароль"></p>';
        echo '<p class="submit"><input type="submit" name="commit" value="Войти"></p>';
      echo "</form>";
    echo "</div>";
  echo "</section>";
echo "</body>";
echo "</html>";

};
?>