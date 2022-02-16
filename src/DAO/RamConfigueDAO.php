<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\RamConfigue;
use ProjetPC\interfaces\DAOInterface;

class RamConfigueDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "ram_configue";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $id["Id_ram"] = $row->Id_ram;
        $id["Id_configue"] = $row->Id_configue;

        $ramConfigue = new RamConfigue();
        $ramConfigue->setId($id);
        $ramConfigue->setQuantite($row->quantite);

        return $ramConfigue;
    }

    public function findRamInConfigue($id):array{
        $sql = "SELECT * FROM ram_configue WHERE Id_configue = ? ";
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