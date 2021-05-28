<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

// проверка соединения с базой данных

echo "<br> Подключение к серверу базы данных (".$MySettings['db_host'].")";
// подключаемся к серверу с параметрами из конфигурационного файла
//$link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);
$link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd']);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

echo " - OK <br>";
echo "<br> Подключение к базе данных ".$MySettings['db_name'];

$result = mysqli_select_db($link, $MySettings['db_name']);

if (!$result) {
    echo " - базы нет, создаём базу данных";
    $query = "CREATE DATABASE ".$MySettings['db_name'];
    $result = mysqli_query($link, $query);// or
}

$result = mysqli_select_db($link, $MySettings['db_name']);

if ($result) echo " - OK<br>";

echo "<br>Проверка доступа к таблице USERS";

// выполняем операции с базой данных
$query ='SELECT * FROM users';
$result = mysqli_query($link, $query);

//or die("Ошибка: " . mysqli_error($link));

$result2 = 0;

if (!$result){
    if (mysqli_errno($link) == 1146) {
        echo " нет таблицы, создаем";
        $query ="CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        login VARCHAR(20) NOT NULL,
        password VARCHAR(20) NOT NULL)";
        $result2 = mysqli_query($link, $query);
    }
}

if ($result or $result2) echo " - OK<br>";

// закрываем подключение
mysqli_close($link);
?>
