<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

session_start();

if (isset ($_SESSION["userid"])) {

    $sNewQLogin = $_POST['new_q_login'];
    $sNewQPassword = $_POST['new_q_password'];

    $bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

    $sQuery = ("INSERT INTO ".$MySettings['db_name'].".users (login, password) VALUES ('".$sNewQLogin."', '".md5($sNewQPassword)."')");
    $bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());

    mysqli_close($bLink);

    header("Location: ./admin.php");
}
else {

    header("Location: ../");

};
