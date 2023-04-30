<?php

namespace App\Controller;

use AbstractCrudController;
use App\Entity\Test;
use App\Resources\TestCollection;
use App\Resources\TestResource;

class TestController extends AbstractCrudController
{
    protected string $entity             = Test::class;
    protected string $resource           = TestResource::class;
    protected string $resourceCollection = TestCollection::class;
}
