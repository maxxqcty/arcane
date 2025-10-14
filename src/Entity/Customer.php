<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Status $status = null;

    #[ORM\ManyToOne(targetEntity: Membership::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membership $membership = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_code = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $joined_at = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $last_visit = null;

    #[ORM\Column(nullable: true)]
    private ?float $total_spent = null;

    #[ORM\Column(nullable: true)]
    private ?int $total_hours = null;

    #[ORM\ManyToMany(targetEntity: Services::class)]
    #[ORM\JoinTable(
        name: "customer_services",
        joinColumns: [new ORM\JoinColumn(name: "customer_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "service_id", referencedColumnName: "id")]
    )]
    private Collection $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    // Getters and setters

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }
    public function setName(string $name): static { $this->name = $name; return $this; }

    public function getStatus(): ?Status { return $this->status; }
    public function setStatus(?Status $status): static { $this->status = $status; return $this; }

    public function getMembership(): ?Membership { return $this->membership; }
    public function setMembership(?Membership $membership): static { $this->membership = $membership; return $this; }

    public function getCustomerCode(): ?string { return $this->customer_code; }
    public function setCustomerCode(string $customer_code): static { $this->customer_code = $customer_code; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): static { $this->email = $email; return $this; }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(string $phone): static { $this->phone = $phone; return $this; }

    public function getJoinedAt(): ?\DateTimeInterface { return $this->joined_at; }
    public function setJoinedAt(\DateTimeInterface $joined_at): static { $this->joined_at = $joined_at; return $this; }

    public function getLastVisit(): ?\DateTimeInterface { return $this->last_visit; }
    public function setLastVisit(\DateTimeInterface $last_visit): static { $this->last_visit = $last_visit; return $this; }

    public function getTotalSpent(): ?float { return $this->total_spent; }
    public function setTotalSpent(?float $total_spent): static { $this->total_spent = $total_spent; return $this; }

    public function getTotalHours(): ?int { return $this->total_hours; }
    public function setTotalHours(?int $total_hours): static { $this->total_hours = $total_hours; return $this; }

    /** @return Collection<int, Services> */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Services $service): static
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
        }
        return $this;
    }

    public function removeService(Services $service): static
    {
        $this->services->removeElement($service);
        return $this;
    }
}
