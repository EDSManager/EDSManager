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
?>
