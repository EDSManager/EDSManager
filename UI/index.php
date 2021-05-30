<?php


echo "<!DOCTYPE html>";
echo "<head>><title>EDSManager | Вход</title>";
    echo '<meta charset="utf-8">';
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
	echo '<link rel="stylesheet" href="../css/style.css">';
echo "</head>";

echo "<body>";
  echo '<section class="container">';
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

?>