<?php 

namespace ProjetPC\DAO;

use PDO;
use ProjetPC\models\Socket;
use ProjetPC\interfaces\DAOInterface;

class SocketDAO extends AbstractDAO implements DAOInterface{
    protected string $tableName = "socket";

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    
    public function hydrate($row) {
        $socket = new Socket();
        $socket->setId($row->Id_socket);
        $socket->setName($row->name);
        return $socket;
    }

    /**
     * Get the value of tableName
     */ 
    public function getTableName():string
    {
        return $this->tableName;
    }
}