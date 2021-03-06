<?php

namespace EDSManager\Classes;

use PDO;
use PDOException;


class DB {

    /** @var PDO */
    private $pdo;

    public function __construct()
    {

        $aMyConfig = new Config('');

        try {

            $this->pdo = new PDO(
               'mysql:host=' . $aMyConfig->get('db_host') . ';dbname=' . $aMyConfig->get('db_name'),
               $aMyConfig->get('db_user'),
               $aMyConfig->get('db_pwd')
            );


            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                if ($e->getCode() == 1049) {
                    echo 'Неверно указано имя базы данных:' .$aMyConfig->get('db_name');
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
