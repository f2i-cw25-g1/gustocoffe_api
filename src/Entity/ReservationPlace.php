<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationPlaceRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *      normalizationContext={
 *          "groups"={"reservation_place_READ"}})
 * @ApiFilter(SearchFilter::class, properties={"date_reservation"="exact"})
 * @ORM\Entity(repositoryClass=ReservationPlaceRepository::class)
 */
class ReservationPlace
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"reservation_place_READ"})
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"reservation_place_READ"})
     */
    private $date_reservation;

    /**
     * @ORM\Column(type="time")
     * @Groups({"reservation_place_READ"})
     */
    private $heure_debut;

    /**
     * @ORM\Column(type="time")
     * @Groups({"reservation_place_READ"})
     */
    private $heure_fin;

    /**
     * @ORM\Column(type="float")
     * @Groups({"reservation_place_READ"})
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=PlaceGrandeSalle::class, inversedBy="reservationsDeLaPlace")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"reservation_place_READ"})
     */
    private $place_grande_salle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"reservation_place_READ"})
     */
    private $option_bureautique;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"reservation_place_READ"})
     */
    private $option_restauration;

    /**
     * @ORM\ManyToOne(targetEntity=Facture::class, inversedBy="listePlacesReservees")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"reservation_place_READ"})
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
