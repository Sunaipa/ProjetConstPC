<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\DAO\PersonDAO;
use ProjetPC\models\Configue;
use ProjetPC\DAO\RamConfigueDAO;
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
        $prDAO = new processorDAO($this->pdo);

        $rDAO = new RamDAO($this->pdo);
        $dDAO = new DdDAO($this->pdo);

        //TODO
        $configue = new Configue();
        $configue->setId($row->Id_configue);
        $configue->setName($row->name);
        $configue->setPrix($row->prix_total);
        $configue->setDescription($row->description);
        $configue->setPerson($pDAO->findSecuredByID($row->Id_person));
        $configue->setCarteGraphique($cgDAO->findByID($row->Id_carte_graphique));
        $configue->setMotherboard($mDAO->findByID($row->Id_motherboard));
        $configue->setBoitier($bDAO->findByID($row->Id_boitier));
        $configue->setProcessor($prDAO->findByID($row->Id_processor));
        $configue->setRam($rDAO->findAllRamByConfigueId($row->Id_person));
        $configue->setDd($dDAO->findAllDdByConfigueId($row->Id_person));
        
        return $configue;
    }

    public function findAllFromAdmin() {
        $sql = 
        "   SELECT * FROM configue as c
            JOIN person as p ON c.id_person = p.Id_person
            JOIN autorisation as a ON p.Id_autorisation = a.Id_autorisation
            WHERE a.name = 'ADMIN' ";

        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute();
        $allConfigueTemp = $this->statementAsHydratedObject();

        if(!is_array($allConfigueTemp)){
            $allConfigue[] = $allConfigueTemp;
        }
        
        return $allConfigue;
    }
    
   
    public function findAllDd($id):array{
        $sql = "SELECT * FROM dd_configue WHERE id_configue = ? ";
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute($id);

        
        $data = $this->statement->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $row){
            $objectList[] = $this->hydrate($row);
        }
        return $objectList;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}