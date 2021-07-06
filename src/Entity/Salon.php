<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SalonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SalonRepository::class)
 */
class Salon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=ReservationSalon::class, mappedBy="salon")
     */
    private $reservationsDuSalon;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_place;

    public function __construct()
    {
        $this->reservationsDuSalon = new ArrayCollection();
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

    /**
     * @return Collection|ReservationSalon[]
     */
    public function getReservationsDuSalon(): Collection
    {
        return $this->reservationsDuSalon;
    }

    public function addReservationsDuSalon(ReservationSalon $reservationsDuSalon): self
    {
        if (!$this->reservationsDuSalon->contains($reservationsDuSalon)) {
            $this->reservationsDuSalon[] = $reservationsDuSalon;
            $reservationsDuSalon->setSalon($this);
        }

        return $this;
    }

    public function removeReservationsDuSalon(ReservationSalon $reservationsDuSalon): self
    {
        if ($this->reservationsDuSalon->removeElement($reservationsDuSalon)) {
            // set the owning side to null (unless already changed)
            if ($reservationsDuSalon->getSalon() === $this) {
                $reservationsDuSalon->setSalon(null);
            }
        }

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->nombre_place;
    }

    public function setNombrePlace(int $nombre_place): self
    {
        $this->nombre_place = $nombre_place;

        return $this;
    }
}
