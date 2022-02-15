<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\DAO\PersonDAO;
use ProjetPC\models\Configue;
use ProjetPC\interfaces\DAOInterface;
use ProjetPC\interfaces\EntityInterface;

class ConfigueDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName= "configue";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }

    protected function hydrate($row) {
        $pDAO = new PersonDAO($this->pdo);
        $cgDAO = new CarteGraphiqueDAO($this->pdo);
        $mDAO = new MotherboardDAO($this->pdo);
        $bDAO = new BoitierDAO($this->pdo);
        $pDAO = new processorDAO($this->pdo);
        $rDAO = new RamDAO($this->pdo);
        $dDAO = new DdDAO($this->pdo);


        //TODO
        $configue = new Configue();
        $configue->id = $row->Id_configue;
        $configue->name = $row->name;
        $configue->prix = $row->prix_total;
        $configue->description = $row->description;
        $configue->person = $pDAO->findOneById($row->Id_person);
        $configue->carteGraphique = $cgDAO->findOneById($row->Id_carte_graphique);
        $configue->motherboard = $mDAO->findOneById($row->Id_Motherboard);
        $configue->boitier = $bDAO->findOneById($row->Id_Boitier);
        $configue->processor = $pDAO->findOneById($row->Id_processor);
        $configue->ram = $rDAO->find($row->Id_person);
        $configue->dd = $dDAO->find($row->Id_person);  
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}