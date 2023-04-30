<?php

namespace App\Abstract;

abstract class ResourceCollection
{

    function __construct(protected array $collection){}

    abstract public function toArray(): array;
}