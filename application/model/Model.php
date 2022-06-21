<?php

namespace application\model;

use PDO;
use PDOException;

class Model
{

     protected $connection;

     public function __construct()
     {
          if (!isset($this->connection)) {
               global $dbHost, $dbName, $dbUserName, $dbPassword;
               $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
               );
               try {
                    $this->connection = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName . ";", $dbUserName, $dbPassword, $options);
               } catch (PDOException $e) {
                    echo "Error: some problem in connection" . $e->getMessage();
               }
          }
     }

     public function __destruct()
     {
          $this->closeConnection();
     }

     protected function query($query, $values = NULL)
     {
          try {

               if ($values != NULL) {
                   $stmt = $this->connection->prepare($query);
                   $stmt->execute($values);
                   return $stmt;
               }
               else {
                    return $this->connection->query($query);
               }
          } catch (PDOException $e) {
               echo "Error: some problem in query connection" . $e->getMessage();
          }
     }

     protected function execute($query, $values = NULL)
     {
          try {
               if ($values == NULL) {
                    $this->connection->exec($query);
               } else {
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute($values);
               }
              return true;
          } catch (PDOException $e) {
               echo "Error: some problem in execute connection" . $e->getMessage();
               return false;
          }
     }

     protected function closeConnection()
     {
          $this->connection = NULL;
     }
}
