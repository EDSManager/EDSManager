<?php

define('APPROOT', dirname(__FILE__).'/');
define('APPCONF', APPROOT.'config/');
define('CONFIG_FILE', 'config-ESDManager.php');

$sConfigFile = '../config/'.CONFIG_FILE;
echo 'Создан файл конфигурации: '.$sConfigFile;

//Принимаем постовые данные
$MySQL_server=$_POST['MySQL_Server'];
$MySQL_User=$_POST['MySQL_User'];
$MySQL_Password=$_POST['MySQL_Password'];


//создаем конфигурационный файл
to_cnf ('<?php');
to_cnf ('') ;
to_cnf ('/**');
to_cnf ('*');
to_cnf ('* Config file, generated by configuration wizard');
to_cnf ('*');
to_cnf ('*/');
to_cnf ('');
to_cnf ('$MySettings = array(');
to_cnf ('');
to_cnf ('//');
to_cnf ('//');
to_cnf ("'MySQL_Server' => '".$MySQL_server."',");
to_cnf ('');
to_cnf ('//');
to_cnf ('//');
to_cnf ("'MySQL_User' => '".$MySQL_User."',");
to_cnf ('');
to_cnf ('//');
to_cnf ('//');
to_cnf ("'MySQL_Password' => '".$MySQL_Password."',");
to_cnf ('');
to_cnf (');');

echo ' - OK';

function to_cnf ($a) {

    $sConfigFile = '../config/'.CONFIG_FILE;

    //открываем файл для записи.Если файл не существует-он будет создан
    $fopen  =  fopen($sConfigFile, 'a+');
//записываем строку
    fputs ($fopen, $a.PHP_EOL);
//закрываем файл
    fclose ($fopen);
}