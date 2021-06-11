<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationPlaceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ReservationPlaceRepository::class)
 */
class ReservationPlace
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reservation;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_debut;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_fin;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=PlaceGrandeSalle::class, inversedBy="reservationsDeLaPlace")
     * @ORM\JoinColumn(nullable=false)
     */
    private $place_grande_salle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $option_bureautique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $option_restauration;

    /**
     * @ORM\ManyToOne(targetEntity=Facture::class, inversedBy="listePlacesReservees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $facture;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heure_debut;
    }

    public function setHeureDebut(\DateTimeInterface $heure_debut): self
    {
        $this->heure_debut = $heure_debut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heure_fin;
    }

    public function setHeureFin(\DateTimeInterface $heure_fin): self
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPlaceGrandeSalle(): ?PlaceGrandeSalle
    {
        return $this->place_grande_salle;
    }

    public function setPlaceGrandeSalle(?PlaceGrandeSalle $place_grande_salle): self
    {
        $this->place_grande_salle = $place_grande_salle;

        return $this;
    }

    public function getOptionBureautique(): ?bool
    {
        return $this->option_bureautique;
    }

    public function setOptionBureautique(bool $option_bureautique): self
    {
        $this->option_bureautique = $option_bureautique;

        return $this;
    }

    public function getOptionRestauration(): ?bool
    {
        return $this->option_restauration;
    }

    public function setOptionRestauration(bool $option_restauration): self
    {
        $this->option_restauration = $option_restauration;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

}
