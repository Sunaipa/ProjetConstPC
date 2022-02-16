<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\CarteGraphique;
use ProjetPC\interfaces\DAOInterface;

class CarteGraphiqueDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "carte_graphique";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {

        $carteGraphique = new CarteGraphique();
        $carteGraphique->setId($row->Id_carte_graphique);
        $carteGraphique->setName($row->name);
        $carteGraphique->setPrix($row->prix);

        return $carteGraphique;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}