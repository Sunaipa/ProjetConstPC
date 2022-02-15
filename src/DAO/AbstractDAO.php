<?php

namespace ProjetPC\DAO;

use PDO;
use PDOStatement;
use ProjetPC\interfaces\DAOInterface;

Abstract class AbstractDAO {
    protected string $tableName = "";
    protected PDOStatement $statement;
    protected DAOInterface $object;
    protected $objectList = [];
    protected PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(){
        $sql = "SELECT * FROM `{$this->tableName}` ";
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute();
        $data = $this->statement->fetchAll(PDO::FETCH_OBJ);

        foreach($data as $row){
            $objectList[] = $this->hydrate($row);
        }

        return $this->statement;
    }

    public function findOneByID($id){
        //TODO
    }

    public function find($id) {
        //TODO
    }

     protected abstract function hydrate($row);
}