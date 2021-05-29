<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

//Принимаем данные
$q_login = $_POST['q_login'];
$q_password = $_POST['q_password'];

// подключаемся к серверу базы данных с параметрами из конфигурационного файла
$link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// выполняем операции с базой данных
$query ="SELECT id FROM users WHERE login = '". $q_login . "' AND password = '". MD5($q_password) ."'";

//echo $query;

$result = mysqli_query($link, $query);
$row = mysqli_fetch_row($result);

$id_user = $row[0];
echo $id_user;
// закрываем подключение
mysqli_close($link);

if ($id_user > 0) {

    header("Location: ./main.php");

}

?>