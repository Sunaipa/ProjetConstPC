<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Motherboard;
use ProjetPC\interfaces\DAOInterface;

class MotherboardDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "motherboard";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $tmDAO = new TypeMotherboardDAO($this->pdo);
        $rtDAO = new RamTypeDAO($this->pdo);

        $motherboard = new Motherboard();
        $motherboard->setId($row->Id_motherboard);
        $motherboard->setName($row->name);
        $motherboard->setPrix($row->prix);
        $motherboard->setChipset($row->chipset);
        $motherboard->setTypeMotherboard($tmDAO->findByID($row->Id_motherboard));   
        $motherboard->setRamType($rtDAO->findByID($row->Id_motherboard));

        return $motherboard;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}