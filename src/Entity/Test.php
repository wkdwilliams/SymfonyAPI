<?php

namespace App\Entity;

use App\Abstract\AbstractEntity;
use App\Repository\TestRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test extends AbstractEntity
{
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\Length([
            'min'        => 1,
            'max'        => 20,
            'minMessage' => 'Your name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your name cannot be longer than {{ limit }} characters',
        ]));
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('firstName', new Assert\Length([
            'min'        => 1,
            'max'        => 20,
            'minMessage' => 'Your first name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
        ]));
        $metadata->addPropertyConstraint('firstName', new Assert\NotBlank());
    }
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $name;

    #[ORM\Column(type: Types::TEXT)]
    private string $firstName;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private DateTime $created_at;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private DateTime $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }
}
