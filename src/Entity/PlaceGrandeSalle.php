<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PlaceGrandeSalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={
 *          "groups"={"place_grande_salle_READ"}})
 * @ORM\Entity(repositoryClass=PlaceGrandeSalleRepository::class)
 */
class PlaceGrandeSalle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"place_grande_salle_READ"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4)
     * @Groups({"place_grande_salle_READ"})
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=ReservationPlace::class, mappedBy="place_grande_salle")
     * @Groups({"place_grande_salle_READ"})
     */
    private $reservationsDeLaPlace;

    public function __construct()
    {
        $this->reservationsDeLaPlace = new ArrayCollection();
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
     * @return Collection|ReservationPlace[]
     */
    public function getReservationsDeLaPlace(): Collection
    {
        return $this->reservationsDeLaPlace;
    }

    public function addReservationsDeLaPlace(ReservationPlace $reservationsDeLaPlace): self
    {
        if (!$this->reservationsDeLaPlace->contains($reservationsDeLaPlace)) {
            $this->reservationsDeLaPlace[] = $reservationsDeLaPlace;
            $reservationsDeLaPlace->setPlaceGrandeSalle($this);
        }

        return $this;
    }

    public function removeReservationsDeLaPlace(ReservationPlace $reservationsDeLaPlace): self
    {
        if ($this->reservationsDeLaPlace->removeElement($reservationsDeLaPlace)) {
            // set the owning side to null (unless already changed)
            if ($reservationsDeLaPlace->getPlaceGrandeSalle() === $this) {
                $reservationsDeLaPlace->setPlaceGrandeSalle(null);
            }
        }

        return $this;
    }
}
