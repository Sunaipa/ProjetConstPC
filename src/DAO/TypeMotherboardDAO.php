<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\TypeMotherboard;
use ProjetPC\interfaces\DAOInterface;

class TypeMotherboardDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "type_motherboard";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $typeMotherboard = new TypeMotherboard();
        $typeMotherboard->setId($row->Id_type_motherboard);
        $typeMotherboard->setName($row->name);
        return $typeMotherboard;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}