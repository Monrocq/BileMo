<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ApiResource(
 *     collectionOperations={"GET"},
 *     itemOperations={"GET"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @UniqueEntity("nom")
 */
class Client implements UserInterface

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
    private $nom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $partnerAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="client", orphanRemoval=true)
     * @ApiSubResource
     */
    private $utilisateurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $password;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPartnerAt(): ?\DateTimeInterface
    {
        return $this->partnerAt;
    }

    public function setPartnerAt(?\DateTimeInterface $partnerAt): self
    {
        $this->partnerAt = $partnerAt;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setClient($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getClient() === $this) {
                $utilisateur->setClient(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles() {
        return ['ROLE_USER'];
    }
    
    public function getSalt() {
        return null;
    }
    public function getUsername() {
        return $this->getNom();
    }
    public function eraseCredentials() {
        // TODO: Implement eraseCredentials() method.
    }

    public function __toString()
    {
        return (string) $this->nom;
    }
}
