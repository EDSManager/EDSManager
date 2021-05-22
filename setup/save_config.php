<?php


define('APPROOT', dirname(__FILE__).'/');
define('APPCONF', APPROOT.'config/');
define('CONFIG_FILE', 'config-ESDManager.php');

$sConfigFile = '../config/'.CONFIG_FILE;

echo 'Создан файл конфигурации: '.$sConfigFile;

//Принимаем постовые данные
$name=$_POST['name'];
$surname=$_POST['surname'];
$phone=$_POST['phone'];

//обращаемся к глобальной переменной SERVER
$ip=$_SERVER['REMOTE_ADDR'];

//формируем строку для записи
$str=$name.' '.$surname.', '.$phone.', '.$ip.'\r\n';

//открываем файл для записи.Если файл не существует-он будет создан
$fopen  =  fopen($sConfigFile, 'a+');
//записываем строку
fputs ($fopen, $str);
//закрываем файл
fclose ($fopen);