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
    echo 'Ваше имя: <input type="text" name="name" /><br />';
    echo 'Ваша фамилия: <input type="text" name="surname" /><br />';
    echo 'Ваш телефон: <input type="text" name="phone" /><br />';
    echo '<input type="submit" value="Отправить форму" />';
    echo '</form>';
?>
