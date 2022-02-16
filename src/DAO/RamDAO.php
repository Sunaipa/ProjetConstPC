<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Ram;
use ProjetPC\DAO\RamConfigueDAO;
use ProjetPC\interfaces\DAOInterface;

class RamDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "ram";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $rtDAO = new RamTypeDAO($this->pdo);

        $ram = new Ram();
        $ram->setId($row->Id_ram);
        $ram->setName($row->name);
        $ram->setPrix($row->prix);
        $ram->setFrequence($row->frequence);
        $ram->setQuantiteGO($row->quantite_GO);
        $ram->setRamType($rtDAO->findByID($row->Id_ram));

        return $ram;
    }

    public function findAllRamByConfigueId($id):array{
        $rcDAO = new RamConfigueDAO($this->pdo);
        $allRamConfigue = $rcDAO->findRamInConfigue($id);
        $allRamInConfigue = [];

        foreach($allRamConfigue as $row => $value){
            $a = $value->getId();
            $ram = $this->findByID($a["Id_ram"]);
            $allRamInConfigue[] = $ram;
        }

        return $allRamConfigue;
    }


    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}