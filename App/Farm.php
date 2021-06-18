<?php

namespace App;

class Farm
{

    public $nameFarm;
    public $barnAnimals = [];
    public $storage;


    public function __construct(string $nameFarm, Storage $storage)
    {
        $this->nameFarm = $nameFarm;
        $this->storage = $storage;
    }


    public function addAnimal(Animal $animal,$countAnimal): void // add animals
    {
        for($i = 0;$i < $countAnimal;$i++){
            $this->barnAnimals[] = $animal;
        }

    }

    public function returnResource(): string // list resource
    {

        return $this->storage->listResource();

    }

    public function returnPlaceInStorage(): int //  quantity free place in storage
    {
        return $this->storage->placeInStorage();

    }


    public function dataProducts(): void // collection of products
    {
        foreach ($this->barnAnimals as $animal)
        {

                $this->storage->addResource($animal->resourceProduced());

        }
    }

    public function countAnimal(): int
    {
        return count($this->barnAnimals);
    }


    public static function run()
    {
        $farm = new Farm('one farm',new BarnResource()); // create Farm and create BarnResource

        $farm->addAnimal(new Chicken(),2);
        $farm->addAnimal(new Cow(),10);
        $farm->dataProducts();


        echo "Добавлено животных: ".$farm->countAnimal()." \n";
        echo "Собрано ресурсов:\n".$farm->returnResource();
        echo "Количество свободного места в амбаре: ".$farm->returnPlaceInStorage();

    }

}

