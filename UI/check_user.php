<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

$sQLogin = $_POST['q_login'];
$sQPassword = $_POST['q_password'];

$bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

if (!$bLink) {
    die("Connection failed: " . mysqli_connect_error());
}

$sQuery ="SELECT id FROM users WHERE login = '". $sQLogin . "' AND password = '". MD5($sQPassword) ."'";

$bResult = mysqli_query($bLink, $sQuery);
$aRow = mysqli_fetch_row($bResult);

$iUserId = (int)$aRow[0];

mysqli_close($bLink);

if ($iUserId > 0) {

    session_start();
    $_SESSION['userid'] = $iUserId;

    header("Location: ./main.php");

} else {

    header("Location: ./");

}
