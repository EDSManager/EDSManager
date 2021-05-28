<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

// проверка соединения с базой данных

echo "<br> Подключение к серверу базы данных (".$MySettings['db_host'].")";
// подключаемся к серверу с параметрами из конфигурационного файла
//$link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);
$link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd']) or die("Connection failed: " . mysqli_connect_error());

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

echo " - OK <br>";
echo "<br> Подключение к базе данных (".$MySettings['db_name'].")";

$result = mysqli_select_db($link, $MySettings['db_name']);

if (!$result) {
    echo " - базы нет, создаём базу данных";
    $query = "CREATE DATABASE ".$MySettings['db_name'];
    $result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_select_db($link, $MySettings['db_name']) or die("Connection failed: " . mysqli_connect_error());

if ($result) echo " - OK<br>";

echo "<br>Проверка доступа к таблице users";

// выполняем операции с базой данных
$query ='SELECT * FROM users';
$result = mysqli_query($link, $query);

$result2 = 0;

if (!$result){
    if (mysqli_errno($link) == 1146) {
        echo " - нет таблицы, создаем";
        $query ="CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        login VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL)";
        $result2 = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());
    }
}

if ($result or $result2) echo " - OK<br>";

echo "<br>";

// если таблица пустая добавляем пользователя eds с паролем eds
$query ="SELECT count(*) FROM users";
$result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());

$row = mysqli_fetch_row($result);
if ($row[0] <= 0){
    echo "Нет записей, добавляем";

    $query = ("INSERT INTO ".$MySettings['db_name'].".users (login, password) VALUES ('eds', '".md5("eds")."')");
    $result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());
};

// закрываем подключение
mysqli_close($link);
?>
