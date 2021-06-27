<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

use \EDSManager\Classes\DB;

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

$database = new DB();
$aResult = $database->query('SELECT id, login FROM users');

if ($aResult) {

    echo '<table>';
    echo '<tr><th>id</th><th>Пользователь</th><th>Статус</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Организация</th></tr>';

    foreach ($aResult as $row)
        {
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['login'] .'</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo "</tr>";
        }

        echo "</table>";

    }

        echo '<a href="./add_user.php"> Добавить пользователя</a>';

?>

                        <br>
                        <br>
                        <h2>Последние попытки входа:</h2>

                        <br>Всего: ХХХ элементов <br>
                        Страницы:  <br><br>



<?php

$aResult = $database->query('SELECT date, ip, login, status, browser FROM logins order by date DESC limit 20');

    if ($aResult) {

        echo '<table>';
    echo '<tr><th>Date</th><th>IP</th><th>Login</th><th>Status</th><th>Browser</th></tr>';

    foreach ($aResult as $row)
        {
            echo '<tr>';
            echo '<td>'. $row['date'] . '</td>';
            echo '<td>'. $row['ip'] .'</td>';
            echo '<td>'. $row['login'] .'</td>';
            echo '<td>'. $row['status'] .'</td>';
            echo '<td>'. $row['browser'] .'</td>';
            echo "</tr>";
        }

        echo "</table>";

    }



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