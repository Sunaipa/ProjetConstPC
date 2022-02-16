<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Boitier;
use ProjetPC\interfaces\DAOInterface;


class BoitierDAO extends AbstractDAO implements DAOInterface {
    protected string $tableName = "boitier";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $tmDAO = new TypeMotherboardDAO($this->pdo);

        $boitier = new Boitier();
        $boitier->setId($row->Id_boitier);
        $boitier->setName($row->name);
        $boitier->setPrix($row->prix);
        $boitier->setTypeMotherboard($tmDAO->findByID($row->Id_boitier));

        return $boitier;
    }
    

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}