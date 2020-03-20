<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImperfectionTypeRepository")
 */
class ImperfectionType
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
    private $Label;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="ImperTypeRelation")
     */
    private $ProductRelation;

    public function __construct()
    {
        $this->ProductRelation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->Label;
    }

    public function setLabel(string $Label): self
    {
        $this->Label = $Label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductRelation(): Collection
    {
        return $this->ProductRelation;
    }

    public function addProductRelation(Product $productRelation): self
    {
        if (!$this->ProductRelation->contains($productRelation)) {
            $this->ProductRelation[] = $productRelation;
            $productRelation->setImperTypeRelation($this);
        }

        return $this;
    }

    public function removeProductRelation(Product $productRelation): self
    {
        if ($this->ProductRelation->contains($productRelation)) {
            $this->ProductRelation->removeElement($productRelation);
            // set the owning side to null (unless already changed)
            if ($productRelation->getImperTypeRelation() === $this) {
                $productRelation->setImperTypeRelation(null);
            }
        }

        return $this;
    }
}
