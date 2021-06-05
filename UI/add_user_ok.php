<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

session_start();

if (isset ($_SESSION["userid"])) {

    //Принимаем данные
    $new_q_login = $_POST['new_q_login'];
    $new_q_password = $_POST['new_q_password'];

// подключаемся к серверу с параметрами из конфигурационного файла
    $link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

    $query = ("INSERT INTO ".$MySettings['db_name'].".users (login, password) VALUES ('".$new_q_login."', '".md5($new_q_password)."')");
    $result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());

    mysqli_close($link);

    header("Location: ./admin.php");
}
else {

    header("Location: ../");

};

?>