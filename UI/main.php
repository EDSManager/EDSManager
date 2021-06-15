<?php

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
                        <h1>Основной контент</h1>
                        <p><br>Здесь будет находится основной контент страницы</p>
                        <p><br>Пользователи: </p>
                        <p><br>Организации: </p>
                    </div>
                </div><!-- конец colLeft -->
            </div><!-- конец content -->
        </div><!-- конец middle -->
    </div><!-- конец wrapper -->
    </body>
    </html>

<?php else: header("Location: ../"); ?>

<?php endif; ?>
