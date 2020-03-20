<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SkinType", inversedBy="ProductRelation")
     */
    private $SkinTypeRelation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ImperfectionType", inversedBy="ProductRelation")
     */
    private $ImperTypeRelation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="ProductRelation")
     */
    private $CommentsRelation;

    public function __construct()
    {
        $this->SkinTypeRelation = new ArrayCollection();
        $this->CommentsRelation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|SkinType[]
     */
    public function getSkinTypeRelation(): Collection
    {
        return $this->SkinTypeRelation;
    }

    public function addSkinTypeRelation(SkinType $skinTypeRelation): self
    {
        if (!$this->SkinTypeRelation->contains($skinTypeRelation)) {
            $this->SkinTypeRelation[] = $skinTypeRelation;
        }

        return $this;
    }

    public function removeSkinTypeRelation(SkinType $skinTypeRelation): self
    {
        if ($this->SkinTypeRelation->contains($skinTypeRelation)) {
            $this->SkinTypeRelation->removeElement($skinTypeRelation);
        }

        return $this;
    }

    public function getImperTypeRelation(): ?ImperfectionType
    {
        return $this->ImperTypeRelation;
    }

    public function setImperTypeRelation(?ImperfectionType $ImperTypeRelation): self
    {
        $this->ImperTypeRelation = $ImperTypeRelation;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getCommentsRelation(): Collection
    {
        return $this->CommentsRelation;
    }

    public function addCommentsRelation(Comments $commentsRelation): self
    {
        if (!$this->CommentsRelation->contains($commentsRelation)) {
            $this->CommentsRelation[] = $commentsRelation;
            $commentsRelation->setProductRelation($this);
        }

        return $this;
    }

    public function removeCommentsRelation(Comments $commentsRelation): self
    {
        if ($this->CommentsRelation->contains($commentsRelation)) {
            $this->CommentsRelation->removeElement($commentsRelation);
            // set the owning side to null (unless already changed)
            if ($commentsRelation->getProductRelation() === $this) {
                $commentsRelation->setProductRelation(null);
            }
        }

        return $this;
    }
}
