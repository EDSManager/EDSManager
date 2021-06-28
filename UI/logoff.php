<?php

require_once ('../approot.inc.php');
use \EDSManager\Classes\DB;

session_start();

$sIpAddres = $_SERVER['REMOTE_ADDR'];
$sBrowser = $_SERVER['HTTP_USER_AGENT'];

$db = new DB();
$sQuery = "INSERT INTO logins ( date, ip, login, browser, status) VALUES (NOW(), :ip, :login, :browser, :status)";
$sParams = [':ip' => $sIpAddres, ':login' => $_SESSION['login'], ':browser' => $sBrowser, ':status' => 'EXIT'];
$aResult = $db->query($sQuery, $sParams);

$_SESSION = array();

header("Location: ../");
