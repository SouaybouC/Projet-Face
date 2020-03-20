<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contains;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="CommentsRelation")
     */
    private $UserRelation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="CommentsRelation")
     */
    private $ProductRelation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContains(): ?string
    {
        return $this->contains;
    }

    public function setContains(?string $contains): self
    {
        $this->contains = $contains;

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

    public function getProductRelation(): ?Product
    {
        return $this->ProductRelation;
    }

    public function setProductRelation(?Product $ProductRelation): self
    {
        $this->ProductRelation = $ProductRelation;

        return $this;
    }
}
