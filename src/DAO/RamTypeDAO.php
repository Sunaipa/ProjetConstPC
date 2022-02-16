<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\RamType;
use ProjetPC\interfaces\DAOInterface;

class RamTypeDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "ram_type";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $ramType = new RamType();
        $ramType->setId($row->Id_ram_type);
        $ramType->setName($row->name);
        return $ramType;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}