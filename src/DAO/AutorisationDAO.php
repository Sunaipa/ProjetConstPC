<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Autorisation;
use ProjetPC\interfaces\DAOInterface;

class AutorisationDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "autorisation";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }

    public function hydrate($row) {
        $autorisation = new Autorisation();
        $autorisation->setId($row->Id_autorisation);
        $autorisation->setName($row->name);
        return $autorisation;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}