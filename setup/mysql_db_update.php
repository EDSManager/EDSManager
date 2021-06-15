<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

$bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

$sQuery = "ALTER TABLE users MODIFY COLUMN login VARCHAR(50) NOT NULL UNIQUE";
$bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_error($bLink));

echo "Таблица users обновлена<br>";

$sQuery ='SHOW TABLES FROM '.$MySettings['db_name'].' LIKE \'logins\'';
$bResult = mysqli_query($bLink, $sQuery);

if (!$bResult) {
    $sQuery = 'CREATE TABLE logins (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        date datetime,
        ip varchar(32),
        login varchar(255),
        browser varchar(255),
        status VARCHAR(255))';
    $bResult = mysqli_query($bLink, $sQuery) or die ('Error: ' . mysqli_error($bLink));
    echo "Таблица logins создана<br>";
} else {
    echo "Таблица logins обновлена<br>";
}



