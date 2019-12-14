<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get_collection"={
 *              "method"="GET",
 *              "path"="/produits",
 *              "normalization_context"={"groups"={"list"}}
 *      }
 *     },
 *     itemOperations={
 *          "get_item"={
 *              "method"="GET",
 *              "path"="/produits/{id}",
 *              "normalization_context"={"groups"={"show"}}
 *      }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"list", "show"})
     *
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"list", "show"})
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"show"})
     */
    private $stockage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show"})
     */
    private $os;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show"})
     */
    private $resolution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show"})
     */
    private $reseau;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show"})
     */
    private $batterie;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list", "show"})
     */
    //private $prix;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Couleur", inversedBy="produits")
     * @Groups({"show"})
     * @ApiSubresource
     */
    private $couleur;

    public function __construct()
    {
        $this->couleur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getStockage(): ?int
    {
        return $this->stockage;
    }

    public function setStockage(int $stockage): self
    {
        $this->stockage = $stockage;

        return $this;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(string $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(?string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getReseau(): ?string
    {
        return $this->reseau;
    }

    public function setReseau(?string $reseau): self
    {
        $this->reseau = $reseau;

        return $this;
    }

    public function getBatterie(): ?string
    {
        return $this->batterie;
    }

    public function setBatterie(?string $batterie): self
    {
        $this->batterie = $batterie;

        return $this;
    }

    /*
    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
    */

    /**
     * @return Collection|Couleur[]
     */
    public function getCouleur(): Collection
    {
        return $this->couleur;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->couleur->contains($couleur)) {
            $this->couleur[] = $couleur;
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        if ($this->couleur->contains($couleur)) {
            $this->couleur->removeElement($couleur);
        }

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }
}
