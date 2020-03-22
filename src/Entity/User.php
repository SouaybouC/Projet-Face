<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *  @UniqueEntity(
 *     fields={"email"},
 *     message="Adresse email déjà utilisée"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe est trop court")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Mot de passe different")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $sex;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserImperfection", mappedBy="UserRelation")
     */
    private $ImperfectionDetected;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="UserRelation")
     */
    private $CommentsRelation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkinType", inversedBy="UserRelation")
     */
    private $SkinTypeRelation;

    public function __construct()
    {
        $this->ImperfectionDetected = new ArrayCollection();
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

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return Collection|UserImperfection[]
     */
    public function getImperfectionDetected(): Collection
    {
        return $this->ImperfectionDetected;
    }

    public function addImperfectionDetected(UserImperfection $imperfectionDetected): self
    {
        if (!$this->ImperfectionDetected->contains($imperfectionDetected)) {
            $this->ImperfectionDetected[] = $imperfectionDetected;
            $imperfectionDetected->setUserRelation($this);
        }

        return $this;
    }

    public function removeImperfectionDetected(UserImperfection $imperfectionDetected): self
    {
        if ($this->ImperfectionDetected->contains($imperfectionDetected)) {
            $this->ImperfectionDetected->removeElement($imperfectionDetected);
            // set the owning side to null (unless already changed)
            if ($imperfectionDetected->getUserRelation() === $this) {
                $imperfectionDetected->setUserRelation(null);
            }
        }

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
            $commentsRelation->setUserRelation($this);
        }

        return $this;
    }

    public function removeCommentsRelation(Comments $commentsRelation): self
    {
        if ($this->CommentsRelation->contains($commentsRelation)) {
            $this->CommentsRelation->removeElement($commentsRelation);
            // set the owning side to null (unless already changed)
            if ($commentsRelation->getUserRelation() === $this) {
                $commentsRelation->setUserRelation(null);
            }
        }

        return $this;
    }


    public function getSkinTypeRelation(): ?SkinType
    {
        return $this->SkinTypeRelation;
    }

    public function setSkinTypeRelation(?SkinType $SkinTypeRelation): self
    {
        $this->SkinTypeRelation = $SkinTypeRelation;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.

    }
}
