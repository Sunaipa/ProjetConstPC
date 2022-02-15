<?php 

namespace ProjetPC\models;

class Motherboard {

    private int $id;
    private string $name;
    private float $prix;
    private string $chipset;
    private TypeMotherboard $typeMotherboard;
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
     * Get the value of chipset
     */ 
    public function getChipset():string
    {
        return $this->chipset;
    }
    /**
     * Set the value of chipset
     *
     * @return  self
     */ 
    public function setChipset(string $chipset):self
    {
        $this->chipset = $chipset;

        return $this;
    }

    /**
     * Get the value of typeMotherboard
     */ 
    public function getTypeMotherboard():TypeMotherboard
    {
        return $this->typeMotherboard;
    }
    /**
     * Set the value of typeMotherboard
     *
     * @return  self
     */ 
    public function setTypeMotherboard(TypeMotherboard $typeMotherboard):self
    {
        $this->typeMotherboard = $typeMotherboard;

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