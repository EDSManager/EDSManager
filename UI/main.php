<?php

session_start();

if (isset ($_SESSION["userid"])) {

    echo "Добро пожаловать в EDSManager, ";

    echo $_SESSION["userid"];

}
else {

    header("Location: ../");

    };



?>

 <form action="logoff.php" method="post">
 <input type="submit" name = "exit" value="Выход" />
 </form>

