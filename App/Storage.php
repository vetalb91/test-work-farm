<?php

namespace App;

interface Storage
{
    public function addResource(array $unit);

    public function listResource(): string;

    public function placeInStorage(): int;

}