<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Processor;
use ProjetPC\interfaces\DAOInterface;

class ProcessorDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "processor";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $sDAO = new SocketDAO($this->pdo);
        
        $processor = new Processor();
        $processor->setId($row->Id_processor);
        $processor->setName($row->name);
        $processor->setPrix($row->prix);
        $processor->setSocket($sDAO->findByID($row->Id_processor));

        return $processor;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}