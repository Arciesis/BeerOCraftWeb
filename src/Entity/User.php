<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\MeController;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @UniqueEntity(fields={"realUsername"}, message="There is already an account with this username")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(collectionOperations: [
    ],
    itemOperations: [
        'get' => ['method' => 'GET'],
        'patch' => [
            'security' => "is_granted('USER_EDIT', object)",
        ],
    ],
    normalizationContext: [
        'groups' => ['user:read'],
    ],
    denormalizationContext: [
        'groups' => ['user:write'],
    ],
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('user:read')]
    #[ApiProperty(identifier: false)]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(['user:read', 'user:write'])]
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 180)]
    #[Assert\Email]
    private $email;

    #[ORM\Column(type: 'json')]
    #[Groups('user:read')]
    private $roles = [];

    /**
     * @var string The hashed password
     *
     */
    #[ORM\Column(type: 'string')]
    #[Groups(['user:read', 'user:write'])]
    #[Assert\NotNull]
    #[Assert\Length(min: 12, max: 255)]
    #[Assert\Regex(pattern: "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/", message: "Password must contain at least one lowercase letter, one uppercase letter, one number and one special character")]
    private $password;

    /**
     * @Assert\Length(min="3", max="25")
     */
    #[ORM\Column(type: 'string', length: 25, unique: true)]
    #[Groups(['user:read', 'user:write'])]
    #[ApiProperty(identifier: true)]
    #[Gedmo\Slug(fields: ['realUsername'])]
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 25)]
    private string $realUsername;

    /**
     * @Ignore()
     */
    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToMany(targetEntity: BoilerEquipment::class, mappedBy: 'owner')]
    #[Groups('user:read')]
    private ?Collection $boilerEquipment;

    #[ORM\OneToMany(targetEntity: BeerRecipe::class, mappedBy: 'realOwner')]
    #[Groups('user:read')]
    private ?Collection $myBeersRecipes;

    #[ORM\ManyToMany(targetEntity: BeerRecipe::class, mappedBy: 'logicalOwner')]
    #[Groups('user:read')]
    private ?Collection $beerRecipes;


    public function __construct()
    {
        $this->boilerEquipment = new ArrayCollection();
        $this->beerRecipes = new ArrayCollection();
        $this->myBeersRecipes = new ArrayCollection();
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
        return (string)$this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string)$this->email;
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
     * @return string
     */
    public function getRealUsername(): string
    {
        return $this->realUsername;
    }

    public function setRealUsername(string $realUsername): self
    {
        $this->realUsername = $realUsername;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|BoilerEquipment[]
     */
    public function getBoilerEquipment(): Collection
    {
        return $this->boilerEquipment;
    }

    public function addBoilerEquipment(BoilerEquipment $boilerEquipment): self
    {
        if (!$this->boilerEquipment->contains($boilerEquipment)) {
            $this->boilerEquipment[] = $boilerEquipment;
            $boilerEquipment->setOwner($this);
        }

        return $this;
    }

    public function removeBoilerEquipment(BoilerEquipment $boilerEquipment): self
    {
        if ($this->boilerEquipment->removeElement($boilerEquipment)) {
            // set the owning side to null (unless already changed)
            if ($boilerEquipment->getOwner() === $this) {
                $boilerEquipment->setOwner(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|BeerRecipe[]
     */
    public function getBeerRecipes(): Collection
    {
        return $this->beerRecipes;
    }

    public function addBeerRecipes(BeerRecipe $beerRecepe): self
    {
        if (!$this->beerRecipes->contains($beerRecepe)) {
            $this->beerRecipes[] = $beerRecepe;
            $beerRecepe->addLogicalOwner($this);
        }

        return $this;
    }

    public function removeBeerRecipes(BeerRecipe $beerRecepe): self
    {
        if ($this->beerRecipes->removeElement($beerRecepe)) {
            $beerRecepe->removeLogicalOwner($this);
        }

        return $this;
    }

    /**
     * @return Collection|BeerRecipe[]
     */
    public function getMyBeersRecipes(): Collection
    {
        return $this->myBeersRecipes;
    }

    public function addMyBeerRecipes(BeerRecipe $myBeersRecipes): self
    {
        if (!$this->myBeerRecipes->contains($myBeersRecipes)) {
            $this->myBeerRecipes[] = $myBeersRecipes;
            $myBeersRecipes->setRealOwner($this);
        }
        return $this;
    }

    public function removeMyBeersRecipes(BeerRecipe $myBeersRecipes): self
    {
        if ($this->myBeersRecipes->removeElement($myBeersRecipes)) {
            // set the owning side to null (unless already changed)
            if ($myBeersRecipes->getRealOwner() === $this) {
                $myBeersRecipes->setRealOwner(null);
            }
        }
        return $this;
    }
}
