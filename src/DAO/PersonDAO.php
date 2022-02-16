<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Person;
use ProjetPC\interfaces\DAOInterface;

class PersonDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "person";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $aDAO = new AutorisationDAO($this->pdo);

        $person = new Person();
        $person->setId($row->Id_person);
        $person->setPseudo($row->pseudo);
        $person->setMdp($row->mdp ?? "default");
        $person->setAutorisation($aDAO->findByID($row->Id_person));

        return $person;
    }

    public function findSecuredByID($id) {
        $sql = "SELECT Id_person, pseudo, Id_autorisation FROM `{$this->tableName}` WHERE `Id_{$this->tableName}` = ? ";
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute([$id]);

        return $this->statementAsHydratedObject();
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}