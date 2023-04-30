<?php

namespace App\Abstract;

abstract class JsonResource
{
    function __construct(protected object $object)
    {

    }

    abstract public function toArray(): array;
}