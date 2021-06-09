<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

echo "<br> Подключение к серверу базы данных (".$MySettings['db_host'].")";

$bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd']) or die("Connection failed: " . mysqli_connect_error());

if (!$bLink) {
    die("Connection failed: " . mysqli_connect_error());
}

echo " - OK <br>";
echo "<br> Подключение к базе данных (".$MySettings['db_name'].")";

$bResult = mysqli_select_db($bLink, $MySettings['db_name']);

if (!$bResult) {
    echo " - базы нет, создаём базу данных";
    $sQuery = "CREATE DATABASE ".$MySettings['db_name'];
    $bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());
}

$bResult = mysqli_select_db($bLink, $MySettings['db_name']) or die("Connection failed: " . mysqli_connect_error());

if ($bResult) echo " - OK<br>";

echo "<br>Проверка доступа к таблице users";

$sQuery ='SELECT * FROM users';
$bResult = mysqli_query($bLink, $sQuery);

$bResult2 = false;

if (!$bResult){
    if (mysqli_errno($bLink) == 1146) {
        echo " - нет таблицы, создаем";
        $sQuery ="CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        login VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL)";
        $bResult2 = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());
    }
}

if ($bResult or $bResult2) echo " - OK<br>";

echo "<br>";

$sQuery ="SELECT count(*) FROM users";
$bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());

$aRow = mysqli_fetch_row($bResult);
if ($aRow[0] <= 0){
    echo "Нет записей, добавляем";

    $sQuery = ("INSERT INTO ".$MySettings['db_name'].".users (login, password) VALUES ('eds', '".md5("eds")."')");
    $bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());
};

// закрываем подключение
mysqli_close($bLink);

header("Location: ../");
