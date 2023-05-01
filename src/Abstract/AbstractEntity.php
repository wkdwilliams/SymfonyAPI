<?php

namespace App\Abstract;

use Symfony\Component\String\UnicodeString;

abstract class AbstractEntity
{
    public function fromArray(array $data): void
    {
        foreach ($data as $property => $value)
        {
            if(!method_exists(
                $this,
                "set".(new UnicodeString($property))->camel())
            ) continue;

            $this->{"set".(new UnicodeString($property))->camel()}($value);
        }
    }
}