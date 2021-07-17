<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationSalonRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"date_reservation"="exact"})
 * @ORM\Entity(repositoryClass=ReservationSalonRepository::class)
 */
class ReservationSalon
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
     * @ORM\ManyToOne(targetEntity=Salon::class, inversedBy="reservationsDuSalon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salon;

    /**
     * @ORM\Column(type="boolean")
     */
    private $option_bureautique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $option_restauration;

    /**
     * @ORM\ManyToOne(targetEntity=Facture::class, inversedBy="listeSalonsReserves")
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

    public function getSalon(): ?Salon
    {
        return $this->salon;
    }

    public function setSalon(?Salon $salon): self
    {
        $this->salon = $salon;

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
