<?php

namespace App\Resources;

use App\Abstract\ResourceCollection;

class TestCollection extends ResourceCollection
{
    public function toArray(): array
    {
        $transformed = [];

        foreach ($this->collection as $value)
            $transformed[] = (new TestResource($value))->toArray();

        return $transformed;
    }
}