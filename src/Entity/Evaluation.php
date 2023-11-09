<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\EvaluationRepository;

#[ORM\Entity(repositoryClass: EvaluationRepository::class)]
#[ApiResource]
class Evaluation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(nullable: true)]
    // private ?int $note = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getNote(): ?int
    // {
    //     return $this->note;
    // }

    // public function setNote(?int $note): static
    // {
    //     $this->note = $note;

    //     return $this;
    // }


   
}
