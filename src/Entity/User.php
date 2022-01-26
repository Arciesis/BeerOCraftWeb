<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
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
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 *
 * @ApiResource(
 *     collectionOperations={
 *     "post"
 *     },
 *      itemOperations={
 *          "get",
 *          "patch"={"security"="is_granted('USER_EDIT', object)"}
 *     },
 *     normalizationContext={"groups"="user:read"},
 *     denormalizationContext={"groups"="user:write"}
 * )
 * @UniqueEntity(fields={"realUsername"}, message="There is already an account with this username")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user:read")
     *
     * @ApiProperty(identifier=false)
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups("user:read")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups("user:read")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     *
     * @Groups("user:read","user:write")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\Length(min="3", max="25")
     * @Groups("user:read")
     * @ApiProperty(identifier=true)
     * @Gedmo\Slug(fields={"realUsername"})
     */
    private string $realUsername;

    /**
     * @ORM\Column(type="boolean")
     * @Ignore()
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=BoilerEquipment::class, mappedBy="owner")
     * @Groups("user:read")
     */
    private $boilerEquipment;

    public function __construct()
    {
        $this->boilerEquipment = new ArrayCollection();
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
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
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
}
