<?php

session_start();

if (isset ($_SESSION["userid"])) {


    echo "Добро пожаловать в EDSManager, ";

    echo $_SESSION["userid"];

    include ("./main_menu.php");
}
else {

    header("Location: ../");

    };



?>
