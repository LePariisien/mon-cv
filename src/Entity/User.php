<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 100)]
    private ?string $numerotel = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: ExperiencePro::class)]
    private Collection $experiencePros;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: ExperienceEtudiant::class)]
    private Collection $experienceEtudiants;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Loisirs::class)]
    private Collection $loisirs;

    public function __construct()
    {
        $this->experiencePros = new ArrayCollection();
        $this->experienceEtudiants = new ArrayCollection();
        $this->loisirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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

    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getadresse(): ?string
    {
        return $this->adresse;
    }

    public function setadresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumerotel(): ?string
    {
        return $this->numerotel;
    }

    public function setNumerotel(string $numerotel): static
    {
        $this->numerotel = $numerotel;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection<int, ExperiencePro>
     */
    public function getExperiencePros(): Collection
    {
        return $this->experiencePros;
    }

    public function addExperiencePro(ExperiencePro $experiencePro): static
    {
        if (!$this->experiencePros->contains($experiencePro)) {
            $this->experiencePros->add($experiencePro);
            $experiencePro->setUser($this);
        }

        return $this;
    }

    public function removeExperiencePro(ExperiencePro $experiencePro): static
    {
        if ($this->experiencePros->removeElement($experiencePro)) {
            // set the owning side to null (unless already changed)
            if ($experiencePro->getUser() === $this) {
                $experiencePro->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExperienceEtudiant>
     */
    public function getExperienceEtudiants(): Collection
    {
        return $this->experienceEtudiants;
    }

    public function addExperienceEtudiant(ExperienceEtudiant $experienceEtudiant): static
    {
        if (!$this->experienceEtudiants->contains($experienceEtudiant)) {
            $this->experienceEtudiants->add($experienceEtudiant);
            $experienceEtudiant->setUser($this);
        }

        return $this;
    }

    public function removeExperienceEtudiant(ExperienceEtudiant $experienceEtudiant): static
    {
        if ($this->experienceEtudiants->removeElement($experienceEtudiant)) {
            // set the owning side to null (unless already changed)
            if ($experienceEtudiant->getUser() === $this) {
                $experienceEtudiant->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Loisirs>
     */
    public function getLoisirs(): Collection
    {
        return $this->loisirs;
    }

    public function addLoisir(Loisirs $loisir): static
    {
        if (!$this->loisirs->contains($loisir)) {
            $this->loisirs->add($loisir);
            $loisir->setUser($this);
        }

        return $this;
    }

    public function removeLoisir(Loisirs $loisir): static
    {
        if ($this->loisirs->removeElement($loisir)) {
            // set the owning side to null (unless already changed)
            if ($loisir->getUser() === $this) {
                $loisir->setUser(null);
            }
        }

        return $this;
    }
}
