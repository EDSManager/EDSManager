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
                        <p><br>Пользователи: </p>
                        <p><br>Организации: </p>
                    </div>
                    <div>
                        <h2> Экземпляры СКЗИ в наличии</h2>
                        <br>
                        <table>
                            <tr><th>Модель СКЗИ</th><th>Экземпляр СКЗИ</th><th>Объект информационной структуры, на котором эксплуатируется СКЗИ</th></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                        </table>
                    </div>
                    <br>
                    <div>
                        <h2>Эксплуатируемая ключевая информация</h2>
                        <br>
                        <table>
                            <tr><th>Наименование</th><th>Выпущен на имя</th><th>Конец срока действия</th></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                            <tr><td>данные</td><td>данные</td><td>данные</td></tr>
                        </table>
                    </div>
                </div><!-- конец colLeft -->
            </div><!-- конец content -->
        </div><!-- конец middle -->
    </div><!-- конец wrapper -->
    </body>
    </html>

<?php else: header("Location: ../"); ?>

<?php endif; ?>
