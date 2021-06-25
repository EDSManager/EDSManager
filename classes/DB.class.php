<?php

namespace EDSManager\Classes;

use PDO;
use PDOException;

class DB {

    /** @var PDO */
    private $pdo;

    public function __construct()
    {

        $sConfigFile = '../config/config-ESDManager.php';
       require $sConfigFile;

        try {

            $this->pdo = new PDO(
               'mysql:host=' . $MySettings['db_host'] . ';dbname=' . $MySettings['db_name'],
               $MySettings['db_user'],
               $MySettings['db_pwd']
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                if ($e->getCode() == 1049) {
                    echo 'Неверно указано имя базы данных (' .$MySettings['db_name'].'), проверьте файл конфигурации: '. $sConfigFile;
                    die();
                } else {
                    echo "Connection failed: " . $e->getMessage();
                    die();
                }

            }

             $this->pdo->exec('SET NAMES UTF8');

        }


    public function query(string $sql, $params = []): array
    {

        try {
        $sth = $this->pdo->prepare($sql);
        } catch (PDOException $e) {
            echo "Prepare failed: " . $e->getMessage();
            //var_dump($sth);
            die();
        }

       try {
           $result = $sth->execute($params);
       } catch (PDOException $e) {
           echo "Execute failed: " . $e->getMessage();
           //var_dump($result);
           die();
       }

        if (false === $result) {
            return [null];
        }

        try {
            return $sth->fetchAll();
        } catch (PDOException $e) {

            return [$result];
        }
    }

}
