<?php

namespace App;

use ErrorException;

class BarnResource implements Storage
{

    public $placeResourceBarn  = 500;
    public $data = [];
    public $listResource;


    /**
     * @throws ErrorException
     */

    public function addResource(array $unit)
    {
            foreach ($unit as $name => $count) {
                $this->data[$name] += $count;
            }

            if($this->placeInStorage() <= 0) {
                throw new ErrorException('is not place in "BarnResource"');
            }
    }
    public function listResource(): string
    {
           foreach ($this->data as $name => $count)
           {
               $this->listResource .= $name."-".$count."\n";
           }

            return $this->listResource;
    }

    public function placeInStorage(): int
    {
        return $this->placeResourceBarn - array_sum($this->data); // quantity free place
    }
}