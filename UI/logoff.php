<?php

session_start();

// Удаляем все переменные сессии.
$_SESSION = array();

header("Location: ../");

?>