<?php

namespace ProjetPC\DAO;

use PDO;

class AbstractDAO {
    private string $tableName = "";
    private PDO $pdo;

    public function __construct(PDO $pdo, string $tableName) {
        $this->pdo = $pdo;
        $this->tableName = $tableName;
    }

    function findAll(){
        $sql = "SELECT * FROM `{$this->tableName}` ";
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute();
        return $sql;
    }
}