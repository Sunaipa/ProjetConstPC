<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Dd;
use ProjetPC\models\Connecteur;
use ProjetPC\interfaces\DAOInterface;

class DdDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "dd";
    
    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }

    public function hydrate($row) {
        $cDAO = new ConnecteurDAO($this->pdo);
        $dd = new Dd();
        $dd->setId($row->Id_dd);
        $dd->setName($row->name);
        $dd->setPrix($row->prix);
        $dd->setConnecteur($cDAO->findByID($row->Id_dd));
        return $dd;
    }

    public function findAllDdByConfigueId($id):array{
        $dcDAO = new DdConfigueDAO($this->pdo);
        $allDdConfigue = $dcDAO->findDdInConfigue($id);
        $allDdInConfigue = [];

        foreach($allDdConfigue as $row => $value){
            $a = $value->getId();
            $ram = $this->findByID($a["Id_dd"]);
            $allDdInConfigue[] = $ram;
        }

        return $allDdConfigue;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}