<?php
// SETUP PAGE

echo 'Текущая версия PHP: ' . phpversion();
echo ' - ';

$ver = (float)phpversion();

if ($ver > 7.0) {
    echo 'Ok';

} elseif ($ver === 7.0) {
    echo 'Ok';

} else {
    echo 'Error. Версия PHP не поддерживается';
}

    echo '"<form action="save_config.php" method="post" enctype="multipart/form-data">';
    echo 'Имя MySQL сервера: <input type="text" name="MySQL_Server" /><br />';
    echo 'Имя пользователя MySQL: <input type="text" name="MySQL_User" /><br />';
    echo 'Пароль пользователя к MySQL: <input type="text" name="MySQL_Password" /><br />';
    echo '<input type="submit" value="Сохранить" />';
    echo '</form>';
?>
