<?php

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

    include("./head.inc.php");

    echo '<!-- начало wrapper -->';
    echo '<div id="wrapper">';
    echo '<div id="middle">';
    echo '<div id="content">';

    include("./menu.inc.php");

    echo '<div id="colMain">';
    echo '<div class="text">';
    echo '<h1>Основной контент</h1>';
    echo '<p>Здесь будет находится основной контент страницы</p>';
    echo '</div>';
    echo '</div><!-- конец colLeft -->';
    echo '</div><!-- конец content -->';
    echo '</div><!-- конец middle -->';
    echo '</div><!-- конец wrapper -->';
    echo '</body>';
    echo '</html>';
} else {

    header("Location: ../");

};
