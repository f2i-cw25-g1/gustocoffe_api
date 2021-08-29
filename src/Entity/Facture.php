<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_commande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_facturation;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal_facturation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays_facturation;

    /**
     * @ORM\OneToMany(targetEntity=ReservationPlace::class, mappedBy="facture")
     */
    private $listePlacesReservees;

    /**
     * @ORM\OneToMany(targetEntity=ReservationSalon::class, mappedBy="facture")
     */
    private $listeSalonsReserves;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="factures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    public function __construct()
    {
        $this->listePlacesReservees = new ArrayCollection();
        $this->listeSalonsReserves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(string $adresse_facturation): self
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function getCodePostalFacturation(): ?int
    {
        return $this->code_postal_facturation;
    }

    public function setCodePostalFacturation(int $code_postal_facturation): self
    {
        $this->code_postal_facturation = $code_postal_facturation;

        return $this;
    }

    public function getPaysFacturation(): ?string
    {
        return $this->pays_facturation;
    }

    public function setPaysFacturation(string $pays_facturation): self
    {
        $this->pays_facturation = $pays_facturation;

        return $this;
    }

    /**
     * @return Collection|ReservationPlace[]
     */
    public function getListePlacesReservees(): Collection
    {
        return $this->listePlacesReservees;
    }

    public function addListePlacesReservee(ReservationPlace $listePlacesReservee): self
    {
        if (!$this->listePlacesReservees->contains($listePlacesReservee)) {
            $this->listePlacesReservees[] = $listePlacesReservee;
            $listePlacesReservee->setFacture($this);
        }

        return $this;
    }

    public function removeListePlacesReservee(ReservationPlace $listePlacesReservee): self
    {
        if ($this->listePlacesReservees->removeElement($listePlacesReservee)) {
            // set the owning side to null (unless already changed)
            if ($listePlacesReservee->getFacture() === $this) {
                $listePlacesReservee->setFacture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReservationSalon[]
     */
    public function getListeSalonsReserves(): Collection
    {
        return $this->listeSalonsReserves;
    }

    public function addListeSalonsReserf(ReservationSalon $listeSalonsReserf): self
    {
        if (!$this->listeSalonsReserves->contains($listeSalonsReserf)) {
            $this->listeSalonsReserves[] = $listeSalonsReserf;
            $listeSalonsReserf->setFacture($this);
        }

        return $this;
    }

    public function removeListeSalonsReserf(ReservationSalon $listeSalonsReserf): self
    {
        if ($this->listeSalonsReserves->removeElement($listeSalonsReserf)) {
            // set the owning side to null (unless already changed)
            if ($listeSalonsReserf->getFacture() === $this) {
                $listeSalonsReserf->setFacture(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

}
