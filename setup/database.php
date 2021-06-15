<?php

    require_once ('../config/config-ESDManager.php');

    $linkDatabase = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

    if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных (' . mysqli_connect_errno() . '):' . mysqli_connect_error();
        exit();
    }