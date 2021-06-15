<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

session_start();

if (isset ($_SESSION["userid"])): ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head><title>EDS Manager</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>

    <?php include("./head.inc.php"); ?>

    <!-- начало wrapper -->
    <div id="wrapper">
        <div id="middle">
            <div id="content">

                <?php include("./menu.inc.php"); ?>

                <div id="colMain">
                    <div class="text">

                        <h2>Учетные записи пользователей:</h2>

                        <br>Всего: ХХХ элементов <br>
                        Страницы:  <br><br>

<?php
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

?>
                    </div>
                </div><!-- конец colLeft -->
            </div><!-- конец content -->
        </div><!-- конец middle -->
    </div><!-- конец wrapper -->
    </body>
    </html>

<?php else: header("Location: ../"); ?>

<?php endif; ?>