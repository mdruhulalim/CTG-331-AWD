<?php
class Car{

    public $enginePower="1500cc";
    public function enginePower(){
        echo $this->enginePower;
    }

    public function GetCar(){
        echo "this is car class";
    }
    
}