<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkinTypeRepository")
 */
class SkinType
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
     * @ORM\Column(type="string", length=255)
     */
    private $Tone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Brightness;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pores;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sensibility;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Blackhead;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="SkinTypeRelation")
     */
    private $ProductRelation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="SkinTypeRelation")
     */
    private $UserRelation;

    public function __construct()
    {
        $this->ProductRelation = new ArrayCollection();
        $this->UserRelation = new ArrayCollection();
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

    public function getTone(): ?string
    {
        return $this->Tone;
    }

    public function setTone(string $Tone): self
    {
        $this->Tone = $Tone;

        return $this;
    }

    public function getBrightness(): ?string
    {
        return $this->Brightness;
    }

    public function setBrightness(string $Brightness): self
    {
        $this->Brightness = $Brightness;

        return $this;
    }

    public function getPores(): ?string
    {
        return $this->Pores;
    }

    public function setPores(string $Pores): self
    {
        $this->Pores = $Pores;

        return $this;
    }

    public function getSensibility(): ?string
    {
        return $this->Sensibility;
    }

    public function setSensibility(string $Sensibility): self
    {
        $this->Sensibility = $Sensibility;

        return $this;
    }

    public function getBlackhead(): ?string
    {
        return $this->Blackhead;
    }

    public function setBlackhead(string $Blackhead): self
    {
        $this->Blackhead = $Blackhead;

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
            $productRelation->addSkinTypeRelation($this);
        }

        return $this;
    }

    public function removeProductRelation(Product $productRelation): self
    {
        if ($this->ProductRelation->contains($productRelation)) {
            $this->ProductRelation->removeElement($productRelation);
            $productRelation->removeSkinTypeRelation($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserRelation(): Collection
    {
        return $this->UserRelation;
    }

    public function addUserRelation(User $userRelation): self
    {
        if (!$this->UserRelation->contains($userRelation)) {
            $this->UserRelation[] = $userRelation;
            $userRelation->setSkinTypeRelation($this);
        }

        return $this;
    }

    public function removeUserRelation(User $userRelation): self
    {
        if ($this->UserRelation->contains($userRelation)) {
            $this->UserRelation->removeElement($userRelation);
            // set the owning side to null (unless already changed)
            if ($userRelation->getSkinTypeRelation() === $this) {
                $userRelation->setSkinTypeRelation(null);
            }
        }

        return $this;
    }
}
