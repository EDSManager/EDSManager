
<?php

//session_start();

if (isset ($_SESSION["userid"])) {

echo '<nav class="menu_color">';
echo '<ul class="my_menu">';
echo '    <li><a href="/">пункт 1</a></li>';
echo '    <li><a href="/">пунтк 2</a></li>';
echo '    <li><a href="/">пункт 3</a></li>';
echo '    <li><a href="/">пункт 4</a></li>';
echo '    <li><a href="logoff.php">Выход</a></li>';
echo '  </ul>';
echo '</nav>';

}
else {

    header("Location: ../");

    };
