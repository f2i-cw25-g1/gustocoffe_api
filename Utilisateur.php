<?php
//ANCIEN FICHIER UTILISATEUR NON VALIDE

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ApiResource(
 *      normalizationContext={
 *          "groups"={"utilisateur_READ"}})
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity("email",message="un utilisateur ayant cette adresse email existe déjà")
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"utilisateur_READ"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message = "Merci de saisir votre email")
     * @Assert\Email(message = "L'adresse email n'est pas valide")
     * @Groups({"utilisateur_READ"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message = "Le mot de passe est obligatoire")
     * @Assert\Length(min="8", minMessage="Veuillez saisir un mot de passe d'au moins 8 caractères")
     * @Assert\Length(max="20", maxMessage="Veuillez saisir un mot de passe de 20 caractères maximum")
     * @Assert\NotCompromisedPassword(message="Le mot de passe saisi a déjà fuité sur internet, veuillez saisir un autre mot de passe.")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="utilisateur")
     * @Groups({"utilisateur_READ"})
     */
    private $factures;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Le nom d'utilisateur est obligatoire")
     * @Assert\Length(min="4", minMessage="Veuillez saisir un nom d'utilisateur d'au moins 4 caractères")
     * @Assert\Length(max="10", maxMessage="Veuillez saisir un nom d'utilisateur de 10 caractères maximum")
     * @Groups({"utilisateur_READ"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Le nom est obligatoire")
     * @Assert\Length(min="2", minMessage="Veuillez saisir un nom d'au moins 2 caractères")
     * @Assert\Length(max="20", maxMessage="Veuillez saisir un nom de 20 caractères maximum")
     * @Groups({"utilisateur_READ"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Le nom prenom est obligatoire")
     * @Assert\Length(min="2", minMessage="Veuillez saisir un prénom d'au moins 2 caractères")
     * @Assert\Length(max="20", maxMessage="Veuillez saisir un prénom de 20 caractères maximum")
     * @Groups({"utilisateur_READ"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"utilisateur_READ"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"utilisateur_READ"})
     */
    private $code_postal_adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"utilisateur_READ"})
     */
    private $adresse_facturation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"utilisateur_READ"})
     */
    private $code_postal_facturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"utilisateur_READ"})
     */
    private $pays_facturation;

    public function __construct()
    {
        $this->factures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures[] = $facture;
            $facture->setUtilisateur($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getUtilisateur() === $this) {
                $facture->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostalAdresse(): ?int
    {
        return $this->code_postal_adresse;
    }

    public function setCodePostalAdresse(?int $code_postal_adresse): self
    {
        $this->code_postal_adresse = $code_postal_adresse;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(?string $adresse_facturation): self
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function getCodePostalFacturation(): ?int
    {
        return $this->code_postal_facturation;
    }

    public function setCodePostalFacturation(?int $code_postal_facturation): self
    {
        $this->code_postal_facturation = $code_postal_facturation;

        return $this;
    }

    public function getPaysFacturation(): ?string
    {
        return $this->pays_facturation;
    }

    public function setPaysFacturation(?string $pays_facturation): self
    {
        $this->pays_facturation = $pays_facturation;

        return $this;
    }
}
