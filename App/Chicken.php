<?php

namespace App;

class Chicken implements Animal
{
    public $id;

    public function __construct()
    {
        $this->id = uniqid();
    }


    public function resourceProduced(): array
    {
        return ["яйцо" => rand(0,1)];  // quantity produced eggs
    }
}