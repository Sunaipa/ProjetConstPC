<?php 

namespace ProjetPC\models;

use ProjetPC\interfaces\EntityInterface;

class Configue implements EntityInterface {
    private int $id;
    private string $name;
    private float $prix;
    private string $description;
    private Person $person;
    private CarteGraphique $carteGraphique;
    private Motherboard $motherboard;
    private Boitier $boitier;
    private Processor $processor;
    private array $ram;
    private array $dd;

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
     * Get the value of description
     */ 
    public function getDescription():string
    {
        return $this->description;
    }
    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(string $description):self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of person
     */ 
    public function getPerson():Person
    {
        return $this->person;
    }
    /**
     * Set the value of person
     *
     * @return  self
     */ 
    public function setPerson(Person $person):self
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get the value of carteGraphique
     */ 
    public function getCarteGraphique():CarteGraphique
    {
        return $this->carteGraphique;
    }
    /**
     * Set the value of carteGraphique
     *
     * @return  self
     */ 
    public function setCarteGraphique(CarteGraphique $carteGraphique):self
    {
        $this->carteGraphique = $carteGraphique;

        return $this;
    }

    /**
     * Get the value of motherboard
     */ 
    public function getMotherboard():Motherboard
    {
        return $this->motherboard;
    }
    /**
     * Set the value of motherboard
     *
     * @return  self
     */ 
    public function setMotherboard(Motherboard $motherboard):self
    {
        $this->motherboard = $motherboard;

        return $this;
    }

    /**
     * Get the value of boitier
     */ 
    public function getBoitier():Boitier
    {
        return $this->boitier;
    }
    /**
     * Set the value of boitier
     *
     * @return  self
     */ 
    public function setBoitier(Boitier $boitier):self
    {
        $this->boitier = $boitier;

        return $this;
    }

    /**
     * Get the value of processor
     */ 
    public function getProcessor():Processor
    {
        return $this->processor;
    }
    /**
     * Set the value of processor
     *
     * @return  self
     */ 
    public function setProcessor(Processor $processor):self
    {
        $this->processor = $processor;

        return $this;
    }

    /**
     * Get the value of ram
     */ 
    public function getRam():array
    {
        return $this->ram;
    }

    /**
     * Set the value of ram
     *
     * @return  self
     */ 
    public function setRam(array $ram):self
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get the value of dd
     */ 
    public function getDd():array
    {
        return $this->dd;
    }

    /**
     * Set the value of dd
     *
     * @return  self
     */ 
    public function setDd(array $dd):self
    {
        $this->dd = $dd;

        return $this;
    }
}