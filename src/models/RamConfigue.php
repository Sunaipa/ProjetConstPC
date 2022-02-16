<?php

namespace ProjetPC\models;

use ProjetPC\interfaces\EntityInterface;

class RamConfigue implements EntityInterface{

    private array $id;
    private int $quantite;


    /**
     * Get the value of id
     */ 
    public function getId():array
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(array  $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite():int
    {
        return $this->quantite;
    }
    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite(int $quantite):self
    {
        $this->quantite = $quantite;

        return $this;
    }
}