<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column (options: ['default' => true])]
    private ?bool $active = null;

    #[ORM\Column(length: 255)]
    private ?string $worktitle = null;

    #[ORM\Column(nullable: true)]
    private ?int $salary = null;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private ?string $email = null;

    /**
     * @var Collection<int, Workplace>
     */
    #[ORM\ManyToMany(targetEntity: Workplace::class, inversedBy: 'employees')]
    private Collection $Id_workplace;

    public function __construct()
    {
        $this->Id_workplace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;
        $this->updateEmail();

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;
        $this->updateEmail();

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getWorktitle(): ?string
    {
        return $this->worktitle;
    }

    public function setWorktitle(string $worktitle): static
    {
        $this->worktitle = $worktitle;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): static
    {
        $this->salary = $salary;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    private function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    private function updateEmail(): void
    {
        if ($this->first_name && $this->last_name) {
            $this->email = strtolower($this->first_name . '.' . $this->last_name . '@example.com');
        }
    }

    /**
     * @return Collection<int, Workplace>
     */
    public function getIdWorkplace(): Collection
    {
        return $this->Id_workplace;
    }

    public function addIdWorkplace(Workplace $idWorkplace): static
    {
        if (!$this->Id_workplace->contains($idWorkplace)) {
            $this->Id_workplace->add($idWorkplace);
        }

        return $this;
    }

    public function removeIdWorkplace(Workplace $idWorkplace): static
    {
        $this->Id_workplace->removeElement($idWorkplace);

        return $this;
    }
}
