<?php

use EDSManager\Classes\DB;

require_once ('../approot.inc.php');

$oData = new DB();

echo "Проверяем базу данных <br>";

$sQuery ='SHOW TABLES';
$aResult = $oData->query($sQuery);// , $sParams);

foreach ($aResult as $aTest)
    $aTestTable[] = $aTest[0];

echo 'Таблица users';
if (in_array('users', $aTestTable)) {

    echo " - OK.<br>";

    // проверить структуру таблицы, при необходимости внести изменения
    //$sQuery = "ALTER TABLE users MODIFY COLUMN login VARCHAR(50) NOT NULL UNIQUE";
    //$aResult = $oData->query($sQuery);
    //echo "Таблица users обновлена<br>";

} else {

    echo ", создается";

    $sQuery ='CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL)';

    $aResult = $oData->query($sQuery);

    echo "- Ok<br>";
}

echo 'Таблица logins';
if (in_array('logins', $aTestTable)) {
    echo " - OK.<br>";
} else {

    echo ", создается";

    $sQuery = 'CREATE TABLE logins (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date datetime,
    ip varchar(32),
    login varchar(255),
    browser varchar(255),
    status VARCHAR(255))';
    $aResult = $oData->query($sQuery);

    echo " - Ok<br>";

}

// Таблица organization: Id, Name
echo 'Таблица organization';

if (in_array('organization', $aTestTable)) {
    echo " - OK.<br>";
} else {

    echo ", создается ";

    $sQuery = 'CREATE TABLE organization (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255))';
    $aResult = $oData->query($sQuery);

    echo "- Ok<br>";

}

// Таблица person: Id, LastName, FirstName, Patronymic
echo 'Таблица person';
if (in_array('person', $aTestTable)) {
    echo " - OK.<br>";
} else {

    echo ", создается ";

    $sQuery = 'CREATE TABLE person (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    LastName varchar(255),
    FirstName varchar(255),
    Patronymic varchar(255))';
    $aResult = $oData->query($sQuery);

    echo "- Ok<br>";

}

// Таблица keyinfo: Id, SerialNumber, Name, CertificationAuthority, IssuedFor, EDSFormat, Purpose,
// CertificateValidityBegin, CertificateValidityExpire, PrivateKeyExpire, Comment
echo 'Таблица keyinfo';
if (in_array('keyinfo', $aTestTable)) {
    echo " - OK.<br>";
} else {

    echo ", создается ";

    $sQuery = 'CREATE TABLE keyinfo (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    SerialNumber varchar(255),
    Name varchar(255),
    CertificationAuthority varchar(255),
    person_id INT,
    EDSFormat varchar(255),
    Purpose varchar(255),
    CertificateValidityBegin datetime,
    CertificateValidityExpire datetime,
    PrivateKeyExpire datetime,
    Comment varchar(255))';

    $aResult = $oData->query($sQuery);

    echo "- Ok<br>";

}
