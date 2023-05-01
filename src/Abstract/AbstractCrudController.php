<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractCrudController extends AbstractController
{
    protected EntityRepository $repository;

    protected string $entity;
    protected string $resource;
    protected string $resourceCollection;

    function __construct(
        protected EntityManagerInterface  $entityManager,
        protected ValidatorInterface      $validator,
        protected RequestStack            $request
    ){
        $this->repository = $entityManager->getRepository($this->entity);
    }

    public function index(): JsonResponse
    {
        $data = $this->toResourceCollection($this->repository->findAll());

        return $this->json([
            'data' => $data
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->repository->find($id); 

        if($data === null)
            throw new Error("Resource not found", 404);

        return $this->json([
            'data' => $this->toResource($data)
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $entity = new $this->entity();
        $entity->fromArray($request->toArray());
        $entity->setCreatedAt(new DateTime());
        $entity->setUpdatedAt(new DateTime());

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        
        return $this->json([
            'data' => $this->toResource($entity)
        ], 201);
    }

    public function update(): JsonResponse
    {
        return $this->json([]);
    }

    public function destroy(): JsonResponse
    {
        return $this->json([]);
    }

    protected function toResource(object $object): array
    {
        return (new $this->resource($object))->toArray();
    }

    protected function toResourceCollection(array $arr): array
    {
        return (new $this->resourceCollection($arr))->toArray();
    }
}