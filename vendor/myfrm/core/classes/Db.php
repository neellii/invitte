<?php

namespace myfrm;

use PDO;
use PDOException;
use PDOStatement;
  
  final class Db {
    private $connection;
    private PDOStatement $stmt;
    private static $instance = null;

    private function __construct() {

    }

    private function __clone()
    {
      
    }

    public function __wakeup()
    {
      
    }
    

    public static function getInstance() {
      if(self::$instance === null) {
        self::$instance = new self();
      }

      return self::$instance;
    }

    public function getConnection(array $db_config) {
      if($this->connection instanceof PDO) {
        return $this;
      }

      $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";

      try {
        $this->connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
        return $this;
      } catch (PDOException $e) {
        // echo "Database Error: {$e->getMessage()}";
        abort(500);
      }
    }

    public function query($query, $params = []) {
      try {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
      } catch(PDOException $e) {
        error_log("[" . date('Y-m-d H:i:s') . "] DB Error: {$e->getMessage()}" . PHP_EOL, 3, ERRORS_LOG_FILE);
        return false;
      }
      
     return $this;
    } //that way we will prevent returning stmt as PDO Object, we will return it as our Db object - adding $stmt private peremennuyu

    public function findAll() {
      return $this->stmt->fetchAll();
    }

    public function find() {
      return $this->stmt->fetch();
    }

    public function findOrFail() {
      $res = $this->find();
      if(!$res) {
        abort();
      }
      return $res;
    }

    public function rowCount() {
      return $this->stmt->rowCount();
    }

    public function getColumn() {
      return $this->stmt->fetchColumn();
    }

    public function getInsertId() {
      return $this->connection->lastInsertId();
    }
  }