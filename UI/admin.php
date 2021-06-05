<?php

require_once ('../approot.inc.php');
require_once (CONFIG_FILE);

session_start();

if (isset ($_SESSION["userid"])) {


    echo "Добро пожаловать в EDSManager, ";

    echo $_SESSION["userid"];

    include("./main_menu.php");

    echo "Пользователи:";

// подключаемся к серверу с параметрами из конфигурационного файла
    $link = mysqli_connect($MySettings['db_host'], $MySettings['db_user'], $MySettings['db_pwd'], $MySettings['db_name']);

    $query = "SELECT id, login FROM users";
    $result = mysqli_query($link, $query) or die("Connection failed: " . mysqli_connect_error());

    if ($result)
    {
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table><tr><th>id</th><th>login</th></tr>";

    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";


    }
    mysqli_close($link);

    echo '<a href="./add_user.php"> Добавить пользователя</a>';

}
else {

    header("Location: ../");

};

?>