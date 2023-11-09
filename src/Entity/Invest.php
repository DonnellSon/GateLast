<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use App\Controller\InvestController;
use App\Repository\InvestRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Metadata\Post as MetadataPost;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: InvestRepository::class)]
#[ApiResource(
     normalizationContext: [
        'groups' => ['invest_read']
    ],
    operations: [
        new Get(),
        new GetCollection(),
        new Put(),
        new Patch(),
        new MetadataPost(
            controller: InvestController::class,
            deserialize: false
        ),
        new Delete()
    ]
)]
#[ApiFilter(SearchFilter::class, properties: ["title" => "partial", 
"description" => "partial",
"need" => "partial",
"domaine.title" => "partial",
"company.name" => "partial",
"company.pays" => "partial",
"collected" => "partial"])]
class Invest
{
    #[ORM\Id]
    #[ORM\Column(type: "string", unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'App\Doctrine\Base58UuidGenerator')]
    private ?string $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['invest_read'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['invest_read'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['invest_read'])]
    private ?string $need = null;

    #[ORM\Column(length: 255)]
    #[Groups(['invest_read'])]
    private ?string $collected = null;

    #[ORM\Column]
    #[Groups(['invest_read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToMany(targetEntity: Domaine::class, mappedBy: 'invest', cascade: ['persist'])]
    #[Groups(['invest_read'])]
    private Collection $domaines;

    #[ORM\ManyToOne(inversedBy: 'invest')]
    #[Groups(['invest_read'])]
    private ?Company $company = null;

    #[ORM\OneToMany(mappedBy: 'invest', targetEntity: InvestPicture::class)]
    private Collection $investPictures;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->domaines = new ArrayCollection();
        $this->investPictures = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNeed(): ?string
    {
        return $this->need;
    }

    public function setNeed(string $need): static
    {
        $this->need = $need;

        return $this;
    }

    public function getCollected(): ?string
    {
        return $this->collected;
    }

    public function setCollected(string $collected): static
    {
        $this->collected = $collected;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Domaine>
     */
    public function getDomaines(): Collection
    {
        return $this->domaines;
    }

    public function addDomaine(Domaine $domaine): static
    {
        if (!$this->domaines->contains($domaine)) {
            $this->domaines->add($domaine);
            $domaine->addInvest($this);
        }

        return $this;
    }

    public function removeDomaine(Domaine $domaine): static
    {
        if ($this->domaines->removeElement($domaine)) {
            $domaine->removeInvest($this);
        }

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection<int, InvestPicture>
     */
    public function getInvestPictures(): Collection
    {
        return $this->investPictures;
    }

    public function addInvestPicture(InvestPicture $investPicture): static
    {
        if (!$this->investPictures->contains($investPicture)) {
            $this->investPictures->add($investPicture);
            $investPicture->setInvest($this);
        }

        return $this;
    }

    public function removeInvestPicture(InvestPicture $investPicture): static
    {
        if ($this->investPictures->removeElement($investPicture)) {
            // set the owning side to null (unless already changed)
            if ($investPicture->getInvest() === $this) {
                $investPicture->setInvest(null);
            }
        }

        return $this;
    }

 
}
