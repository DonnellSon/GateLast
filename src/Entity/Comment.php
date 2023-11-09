<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\CommentableEntity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommentRepository;
use App\Controller\CustomCommentController;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Metadata\Post as MetadataPost;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ApiResource(
    // operations: [
    //     new MetadataPost(
    //         controller: CustomCommentController::class,
    //         deserialize: false
    //     ),
    // ]
)]
class Comment
{
    #[ORM\Id]
    #[ORM\Column(type:"string", unique:true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'App\Doctrine\Base58UuidGenerator')]
    #[Groups(['posts_read'])]
    private ?string $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['posts_read','image_read'])]
    private ?string $content = null;

    #[ORM\Column]
    #[Groups(['posts_read','image_read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(targetEntity:Author::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['posts_read','image_read'])]
    private ?Author $author = null;

    #[ORM\ManyToOne(targetEntity:CommentableEntity::class)]
    private $commentable;

    

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function preUpdate()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PrePersist]
    public function PrePersist()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getCommentable(): ?CommentableEntity
    {
        return $this->commentable;
    }

    public function setCommentable(?CommentableEntity $commentable): static
    {
        $this->commentable = $commentable;

        return $this;
    }
    

    

    

    
}
