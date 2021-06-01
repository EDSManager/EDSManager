
<?php

//session_start();

if (isset ($_SESSION["userid"])) {

    echo "<!DOCTYPE html>";
    echo "<head><title>EDSManager</title>";
    echo '<meta charset="utf-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
//    echo '<link rel="stylesheet" href="../css/style.css">';
    echo "</head>";

    echo "<body>";

echo '    <div id="menu">';
echo '    <p>	<a href="#">ссылка 1</a> </p>';
echo '    <p>	<a href="#">ссылка 2</a> </p>';
echo '    <p>	<a href="#">ссылка 3</a> </p>';
echo '    <p>	<a href="#">ссылка 4</a> </p>';
echo '    <p>	<a href="logoff.php">Выход</a> </p>';
echo '    </div> ';

echo '</body>';
}
else {

    header("Location: ../");

    };
