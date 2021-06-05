<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

$link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

$query = "ALTER TABLE users MODIFY COLUMN login VARCHAR(50) NOT NULL UNIQUE";
$result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());
