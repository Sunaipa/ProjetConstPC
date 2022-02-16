<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\DdConfigue;
use ProjetPC\interfaces\DAOInterface;

class DdConfigueDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "dd_configue";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $id["Id_dd"] = $row->Id_dd;
        $id["Id_configue"] = $row->Id_configue;

        $ddConfigue = new DdConfigue();
        $ddConfigue->setId($id);
        $ddConfigue->setQuantite($row->quantite);

        return $ddConfigue;
    }

    public function findDdInConfigue($id):array{
        $sql = "SELECT * FROM dd_configue WHERE Id_configue = ? ";
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