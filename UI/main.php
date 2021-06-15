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
