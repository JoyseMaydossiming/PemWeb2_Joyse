<?php

class Fruit{
    public $name;
    public $color;
    public $weight;

    function set_name($n){
        $this->name = $n;
        echo "This is a $this->name";
    }
    protected function set_color($n){
        $this->color = $n;
    }
    private function set_weight($n){
        $this->wight = $n;
    }
}

$manggo = new Fruit();
$manggo->set_name('Manggo');

?>