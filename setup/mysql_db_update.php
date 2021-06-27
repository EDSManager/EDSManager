<?php

use EDSManager\Classes\DB;
use EDSManager\Classes\Config;

require_once ('../approot.inc.php');

$oData = new DB();
$oConfig = new Config('');

//$sQuery = "ALTER TABLE users MODIFY COLUMN login VARCHAR(50) NOT NULL UNIQUE";
//$aResult = $oData->query($sQuery);
//echo "Таблица users обновлена<br>";

$sQuery ='SHOW TABLES';
//$sParams = [':dbname' => $oConfig->get('db_name')];

$aResult = $oData->query($sQuery);// , $sParams);
var_dump($aResult);

die;

//$bResult = mysqli_query($bLink, $sQuery);

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

// Таблица organization: Id, Name

// Создание таблицы person: Id, LastName, FirstName, Patronymic

// Создание таблицы keyinfo: Id, SerialNumber, Name, CertificationAuthority, IssuedFor, EDSFormat, Purpose,
// CertificateValidityBegin, CertificateValidityBegin, CertificateValidityExpire, PrivateKeyExpire, Comment