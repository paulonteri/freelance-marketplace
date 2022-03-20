<?php

namespace app;

use PDO;

class Database
{

    private $host = '192.168.64.2';
    private $user = 'freelance';
    private $password = 'freelance';
    private $dbName = 'freelance';

    protected function connectToDb() {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
      $pdo = new PDO($dsn, $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    }

  }
