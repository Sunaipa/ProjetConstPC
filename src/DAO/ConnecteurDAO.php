<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Connecteur;
use ProjetPC\interfaces\DAOInterface;

class ConnecteurDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "connecteur";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $connecteur = new Connecteur();
        $connecteur->setId($row->Id_connecteur);
        $connecteur->setName($row->name);

        return $connecteur;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}