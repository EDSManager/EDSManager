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

//обращаемся к глобальной переменной SERVER
$ip=$_SERVER['REMOTE_ADDR'];

//формируем строку для записи
$str='MySQL_Server: '.$MySQL_server.' \r\n'.'MySQL_User: '.$MySQL_User.' \r\n'.'MySQL_Password: '.$MySQL_Password.' \r\n'.$ip.'\r\n';

//открываем файл для записи.Если файл не существует-он будет создан
$fopen  =  fopen($sConfigFile, 'a+');
//записываем строку
fputs ($fopen, $str);
//закрываем файл
fclose ($fopen);