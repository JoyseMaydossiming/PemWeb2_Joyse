<?php

class Dispenser{
    protected $volume; //hanya bisa di akses untuk class turunan
    private $warna; //hanya berfungsi di dalam class saja
    public $merk; 
}

class Akua extends Dispenser{
    protected $volume = 100; //hanya untuk pengoahan data
    
    function getVolume(){
        echo $this->volume;
    }
}

$object1 = new Dispenser();
$object1->merk = "Ale-ale";

echo $object1->merk;
?>