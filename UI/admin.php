<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

session_start();

if (isset ($_SESSION["userid"])) {


    echo '<!DOCTYPE html>';
    echo '<html lang="ru">';
    echo '<head><title>EDS Manager</title>';
    echo '<meta charset="utf-8" />';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
    echo '<link rel="stylesheet" href="../css/style.css">';

    echo '</head>';
    echo '<body>';
    echo '<div id="headerInner">';
    echo '  <div class="logo">';
    echo '     <a href="#">EDS Manager</a>';
    echo '  </div>';

    echo '<div class = "sprava">               ';
    echo "Добро пожаловать в EDSManager, ".$_SESSION["userid"];
    echo '</div>';

    echo '</div>';
    echo '<!-- начало wrapper -->';
    echo '<div id="wrapper">';
    echo '   <div id="middle">';
    echo '       <div id="content">';

    include ("./main_menu.php");

    echo '          <div id="colMain">';
    echo '              <div class="text">';


    echo "<h1>Пользователи:</h1>";

// подключаемся к серверу с параметрами из конфигурационного файла
    $link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

    $query = "SELECT id, login FROM users";
    $result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());

    if ($result)
    {
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table><tr><th>id</th><th>login</th></tr>";

    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";


    }
    mysqli_close($link);

    echo '<a href="./add_user.php"> Добавить пользователя</a>';


    echo '              </div>';
    echo '          </div><!-- конец colLeft -->';
    echo '       </div><!-- конец content -->';
    echo '   </div><!-- конец middle -->';
    echo '</div><!-- конец wrapper -->';
    echo '</body>';
    echo '</html>';

}
else {

    header("Location: ../");

};

?>