<?php 

namespace ProjetPC\models;

use ProjetPC\interfaces\EntityInterface;

class Person implements EntityInterface{

    private int $id;
    private string $pseudo;
    private string $mdp;
    private Autorisation $autorisation;

    /**
     * Get the value of id
     */ 
    public function getId():int
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo():string
    {
        return $this->pseudo;
    }
    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo(string $pseudo):self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp():string
    {
        return $this->mdp;
    }
    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp(string $mdp):self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getAutorisation():Autorisation
    {
        return $this->autorisation;
    }
    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setAutorisation(Autorisation $autorisation):self
    {
        $this->autorisation = $autorisation;

        return $this;
    }
}