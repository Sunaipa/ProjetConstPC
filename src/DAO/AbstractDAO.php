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
        
        return $this->statementAsHydratedObject();
    }

    public function findByID($id){
        $sql = "SELECT * FROM `{$this->tableName}` WHERE `Id_{$this->tableName}` = ? ";
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute([$id]);

        return $this->statementAsHydratedObject();
    }

     protected function statementAsHydratedObject(){
        $data = $this->statement->fetchAll(PDO::FETCH_OBJ);
        if(count($data) > 1 ) {
           foreach($data as $row){
                $objectList[] = $this->hydrate($row);
            } 
            return $objectList; 
        } else {
            foreach($data as $row){
                $object = $this->hydrate($row);
            } 
            return $object;
        } 
     }

     protected function getFirst() {
        
     }
     protected abstract function hydrate($row);
}