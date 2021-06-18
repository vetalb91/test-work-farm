<?php

namespace App;

class Cow implements Animal
{
    public $id;

    public function __construct()
    {
        $this->id = uniqid();
    }


    public function resourceProduced(): array
    {
        return ["молоко" => rand(8,12)]; // quantity produced milk
    }
}