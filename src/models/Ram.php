<?php 

namespace ProjetPC\models;

use ProjetPC\DAO\RamDAO;
use ProjetPC\models\RamType;

class RAM {

    private int $id;
    private string $name;
    private float $prix;
    private int $frequence;
    private int $quantiteGO;
    private RamType $ramType;


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
     * Get the value of frequence
     */ 
    public function getFrequence():int
    {
        return $this->frequence;
    }
    /**
     * Set the value of frequence
     *
     * @return  self
     */ 
    public function setFrequence(int $frequence):self
    {
        $this->frequence = $frequence;

        return $this;
    }

    /**
     * Get the value of quantiteGO
     */ 
    public function getQuantiteGO():int
    {
        return $this->quantiteGO;
    }
    /**
     * Set the value of quantiteGO
     *
     * @return  self
     */ 
    public function setQuantiteGO(int $quantiteGO):self
    {
        $this->quantiteGO = $quantiteGO;

        return $this;
    }

    /**
     * Get the value of ramType
     */ 
    public function getRamType():RamType
    {
        return $this->ramType;
    }
    /**
     * Set the value of ramType
     *
     * @return  self
     */ 
    public function setRamType(RamType $ramType):self
    {
        $this->ramType = $ramType;

        return $this;
    }
}