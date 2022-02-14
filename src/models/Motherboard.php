<?php 

namespace ProjetPC\models;

class Motherboard {

    private int $id;
    private string $name;
    private float $pric;
    private string $chipset;
    private TypeMotherboard $typeMotherboard;
    private RamType $ramType;
}