<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserImperfectionRepository")
 */
class UserImperfection
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place;

    /**
     * @ORM\Column(type="date")
     */
    private $DateImperfection;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="ImperfectionDetected")
     */
    private $UserRelation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ImperfectionType")
     */
    private $CategoryImperfection;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDateImperfection(): ?\DateTimeInterface
    {
        return $this->DateImperfection;
    }

    public function setDateImperfection(\DateTimeInterface $DateImperfection): self
    {
        $this->DateImperfection = $DateImperfection;

        return $this;
    }

    public function getUserRelation(): ?User
    {
        return $this->UserRelation;
    }

    public function setUserRelation(?User $UserRelation): self
    {
        $this->UserRelation = $UserRelation;

        return $this;
    }

    public function getCategoryImperfection(): ?ImperfectionType
    {
        return $this->CategoryImperfection;
    }

    public function setCategoryImperfection(?ImperfectionType $CategoryImperfection): self
    {
        $this->CategoryImperfection = $CategoryImperfection;

        return $this;
    }
}
