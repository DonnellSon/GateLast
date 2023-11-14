<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GlobalSearchRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlobalSearchRepository::class)]
#[ApiResource()]
class GlobalSearch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $query;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($query): ?self
    {
        $this->query = $query;

        return $this;
    }
}
