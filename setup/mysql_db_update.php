<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

$bLink = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

$sQuery = "ALTER TABLE users MODIFY COLUMN login VARCHAR(50) NOT NULL UNIQUE";
$bResult = mysqli_query($bLink, $sQuery) or die("Connection failed: " . mysqli_connect_error());
