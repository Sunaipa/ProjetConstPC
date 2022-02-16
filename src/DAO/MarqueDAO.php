<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Marque;
use ProjetPC\interfaces\DAOInterface;

class MarqueDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "marque";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $marque = new Marque();
        $marque->setId($row->Id_marque);
        $marque->setName($row->name);
        return $marque;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}