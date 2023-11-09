<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Company;
use App\Entity\Contact;
use ApiPlatform\Metadata\Get;
use App\Config\ContactStatus;
use App\Entity\Investissement;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping\JoinColumn;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use App\Controller\GetAuthorContactsController;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\Post as PostMetadata;
use App\Controller\AcceptContactController;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ApiResource(
    normalizationContext:[
        "groups"=> 'author_read'
    ]
)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name:"author_type", type:"string")]
#[ORM\DiscriminatorMap(["user" => User::class, "company" => Company::class])]

#[ApiResource(
   operations:[
    new Get(
        uriTemplate: '/authors/{id}/contacts',
        controller: GetAuthorContactsController::class,
        deserialize: false
    ),
   ]
 )]
abstract class Author
{
    #[ORM\Id]
    #[ORM\Column(type: "string", unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'App\Doctrine\Base58UuidGenerator')]
    #[Groups(['posts_read','image_read','discu_read','users_read', 'invest_read', 'company_read', 'ct_read','contact_read','msg_read','job_offers_read'])]
    private ?string $id = null;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Post::class, orphanRemoval: true)]
    private Collection $posts;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Company::class, orphanRemoval: true)]
    private Collection $companies;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Investissement::class, orphanRemoval: true)]
    #[Groups([ 'ct_read'])]
    private Collection $investissements;

    #[ORM\OneToMany(targetEntity:Contact::class, mappedBy:"requester")]
    private $sentRequests;

    #[ORM\OneToMany(targetEntity:Contact::class, mappedBy:"receiver")]
    private $receivedRequests;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: JobOffer::class)]
    private Collection $jobOffers;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->companies = new ArrayCollection();
        $this->investissements = new ArrayCollection();
        $this->sentRequests = new ArrayCollection();
        $this->receivedRequests = new ArrayCollection();
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setAuthor($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            if ($post->getAuthor() === $this) {
                $post->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setAuthor($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getAuthor() === $this) {
                $comment->setAuthor(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection<int, Company>
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): static
    {
        if (!$this->companies->contains($company)) {
            $this->companies->add($company);
            $company->setAuthor($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): static
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getAuthor() === $this) {
                $company->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, investissement>
     */
    public function getInvestissements(): Collection
    {
        return $this->investissements;
    }

    public function addInvestissement(Investissement $investissement): static
    {
        if (!$this->investissements->contains($investissement)) {
            $this->investissements->add($investissement);
            $investissement->setAuthor($this);
        }
    
        return $this;
    }
    
    public function removeInvestissement(Investissement $investissement): static
    {
        if ($this->investissements->removeElement($investissement)) {
            // set the owning side to null (unless already changed)
            if ($investissement->getAuthor() === $this) {
                $investissement->setAuthor(null);
            }
        }
    
        return $this;
    }

    
    public function getSentRequests(): Collection
    {
        return $this->sentRequests;
    }

    public function addSentRequest(Contact $contact): self
    {
        if (!$this->sentRequests->contains($contact)) {
            $this->sentRequests[] = $contact;
            $contact->setRequester($this);
        }

        return $this;
    }

    public function removeSentRequest(Contact $contact): self
    {
        if ($this->sentRequests->contains($contact)) {
            $this->sentRequests->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getRequester() === $this) {
                $contact->setRequester(null);
            }
        }

        return $this;
    }

    public function getReceivedRequests(): Collection
    {
        return $this->receivedRequests;
    }

    public function addReceivedRequest(Contact $contact): self
    {
        if (!$this->receivedRequests->contains($contact)) {
            $this->receivedRequests[] = $contact;
            $contact->setReceiver($this);
        }

        return $this;
    }

    public function removeReceivedRequest(Contact $contact): self
    {
        if ($this->receivedRequests->contains($contact)) {
            $this->receivedRequests->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getReceiver() === $this) {
                $contact->setReceiver(null);
            }
        }

        return $this;
    }

    /**
     * Get accepted contacts
     *
     * @return Collection|Author[]
     */
    public function getContacts(): Collection
    {
        $sentAccepted = $this->sentRequests->filter(function(Contact $contact) {
            return $contact->getStatus() === ContactStatus::ACCEPTED;
        })->map(function(Contact $contact) {
            return $contact->getReceiver();
        });

        $receivedAccepted = $this->receivedRequests->filter(function(Contact $contact) {
            return $contact->getStatus() === ContactStatus::ACCEPTED;
        })->map(function(Contact $contact) {
            return $contact->getRequester();
        });

        return new ArrayCollection(array_merge($sentAccepted->toArray(), $receivedAccepted->toArray()));
    }

    /**
     * @return Collection<int, JobOffer>
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): static
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers->add($jobOffer);
            $jobOffer->setAuthor($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): static
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getAuthor() === $this) {
                $jobOffer->setAuthor(null);
            }
        }

        return $this;
    }


}

