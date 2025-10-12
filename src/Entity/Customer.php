<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $membership = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_code = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column]
    private ?\DateTime $joined_at = null;

    #[ORM\Column]
    private ?\DateTime $last_visit = null;

    #[ORM\Column(nullable: true)]
    private ?float $total_spent = null;

    #[ORM\Column(nullable: true)]
    private ?int $total_hours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getMembership(): ?string
    {
        return $this->membership;
    }

    public function setMembership(string $membership): static
    {
        $this->membership = $membership;

        return $this;
    }

    public function getCustomerCode(): ?string
    {
        return $this->customer_code;
    }

    public function setCustomerCode(string $customer_code): static
    {
        $this->customer_code = $customer_code;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getJoinedAt(): ?\DateTime
    {
        return $this->joined_at;
    }

    public function setJoinedAt(\DateTime $joined_at): static
    {
        $this->joined_at = $joined_at;

        return $this;
    }

    public function getLastVisit(): ?\DateTime
    {
        return $this->last_visit;
    }

    public function setLastVisit(\DateTime $last_visit): static
    {
        $this->last_visit = $last_visit;

        return $this;
    }

    public function getTotalSpent(): ?float
    {
        return $this->total_spent;
    }

    public function setTotalSpent(?float $total_spent): static
    {
        $this->total_spent = $total_spent;

        return $this;
    }

    public function getTotalHours(): ?int
    {
        return $this->total_hours;
    }

    public function setTotalHours(?int $total_hours): static
    {
        $this->total_hours = $total_hours;

        return $this;
    }
}
