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
    echo '<div class="logo">';
    echo '<a href="../">EDS Manager</a>';
    echo '</div>';

    echo '<div class = "sprava">               ';
    echo "Добро пожаловать в EDSManager, ".$_SESSION["userid"];
    echo '</div>';

    echo '</div>';
    echo '<!-- начало wrapper -->';
    echo '<div id="wrapper">';
    echo '<div id="middle">';
    echo '<div id="content">';

    include ("./main_menu.php");

    echo '<div id="colMain">';
    echo '<div class="text">';

    echo "<h2>Учетные записи пользователей:</h2>";

    echo '<br>Всего: ХХХ элементов <br>';
    echo 'Страницы:  <br><br>';

    $bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

    $sQuery = "SELECT id, login FROM users";
    $bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());

    if ($bResult) {
    $aRows = mysqli_num_rows($bResult); // количество полученных строк

    echo '<table>';
    echo '<tr><th>id</th><th>Пользователь</th><th>Статус</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Организация</th></tr>';

        for ($i = 0 ; $i < $aRows ; ++$i) {
            $aRow = mysqli_fetch_row($bResult);
            echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$aRow[$j]</td>";
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo "</tr>";
        }
    echo "</table>";

    }
    mysqli_close($bLink);

    echo '<a href="./add_user.php"> Добавить пользователя</a>';


    echo '</div>';
    echo '</div><!-- конец colLeft -->';
    echo '</div><!-- конец content -->';
    echo '</div><!-- конец middle -->';
    echo '</div><!-- конец wrapper -->';
    echo '</body>';
    echo '</html>';

}
else {

    header("Location: ../");

};

?>