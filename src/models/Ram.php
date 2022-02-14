<?php 

namespace ProjetPC\models;

use ProjetPC\models\RamType;

class RAM {

    private int $id;
    private string $name;
    private float $prix;
    private int $frequence;
    private int $quantiteGO;
    private RamType $ramType;

}