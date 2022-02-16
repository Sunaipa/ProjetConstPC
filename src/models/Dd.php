<?php 

namespace ProjetPC\models;

use ProjetPC\interfaces\EntityInterface;

class Dd implements EntityInterface {

    private int $id;
    private string $name;
    private float $prix;
    private Connecteur $connecteur;

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
     * Get the value of name
     */ 
    public function getName():string
    {
        return $this->name;
    }
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix():float
    {
        return $this->prix;
    }
    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix(float $prix):self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of connecteur
     */ 
    public function getConnecteur():Connecteur
    {
        return $this->connecteur;
    }
    /**
     * Set the value of connecteur
     *
     * @return  self
     */ 
    public function setConnecteur(Connecteur $connecteur):self
    {
        $this->connecteur = $connecteur;

        return $this;
    }
}