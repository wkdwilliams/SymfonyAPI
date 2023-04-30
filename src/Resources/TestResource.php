<?php

namespace App\Resources;

use App\Abstract\JsonResource;

class TestResource extends JsonResource
{
    public function toArray(): array
    {
        return [
            'id'         => $this->object->getId(),
            'name'       => $this->object->getName(),
            'created_at' => $this->object->getCreatedAt(),
            'updated_at' => $this->object->getUpdatedAt()
        ];
    }
}