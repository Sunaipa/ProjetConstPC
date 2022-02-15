<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\interfaces\DAOInterface;

class PersonDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "person";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}