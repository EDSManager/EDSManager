<?php

define('APPROOT', '../');
define('APPCONF', APPROOT.'config/');
define('CONFIG_FILE', APPCONF.'config-ESDManager.php');

if (!is_dir(APPCONF)) {
    // создаём папку
    mkdir(APPCONF);
}

//Принимаем данные
$db_host=$_POST['db_host'];
$db_name=$_POST['db_name'];
$db_user=$_POST['db_user'];
$db_pwd=$_POST['db_pwd'];

echo 'Создаётся файл конфигурации: '.CONFIG_FILE;

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
to_cnf ('// Сервер базы данных');
to_cnf ('// localhost');
to_cnf ("'db_host' => '".$db_host."',");
to_cnf ('');
to_cnf ('// Имя базы данных');
to_cnf ('// eds');
to_cnf ("'db_name' => '".$db_name."',");
to_cnf ('');
to_cnf ('// Имя пользователя базы данных');
to_cnf ('//');
to_cnf ("'db_user' => '".$db_user."',");
to_cnf ('');
to_cnf ('// Пароль пользователя базы данных');
to_cnf ('//');
to_cnf ("'db_pwd' => '".$db_pwd."'");
to_cnf ('');
to_cnf (');');

echo ' - OK';

function to_cnf ($a) {

    //открываем файл для записи.Если файл не существует-он будет создан
    $fopen  =  fopen(CONFIG_FILE, 'a+');
//записываем строку
    fputs ($fopen, $a.PHP_EOL);
//закрываем файл
    fclose ($fopen);
}