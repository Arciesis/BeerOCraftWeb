<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BoilerEquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BoilerEquipmentRepository::class)]
#[ApiResource()]

class BoilerEquipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    private String $name;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull]
    private int $preBoilVolume;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull]
    private int $batchSize;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    private int $boilTime;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    private int $evaporationRatePercentage;

    #[ORM\Column(type: 'float')]
    #[Assert\NotNull]
    private float $grainAbsorption;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'boilerEquipment')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private User $owner;

    #[ORM\OneToMany(targetEntity: BeerRecipe::class, mappedBy: 'equipment')]
    private ?Collection $beerRecipes;

    #[ORM\Column(length: 255)]
    #[ApiProperty(identifier: true)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    public function __construct()
    {
        $this->beerRecipes = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function getPreBoilVolume(): ?int
    {
        return $this->preBoilVolume;
    }
    public function setPreBoilVolume(int $preBoilVolume): self
    {
        if ($preBoilVolume > 0) {
            $this->preBoilVolume = $preBoilVolume;
        } else {
            throw new \InvalidArgumentException('negative or null pre boil volume');
        }

        return $this;
    }
    public function getBatchSize(): ?int
    {
        return $this->batchSize;
    }
    public function setBatchSize(int $batchSize): self
    {
        if ($batchSize > 0) {
            $this->batchSize = $batchSize;
        } else {
            throw new \InvalidArgumentException('negative or null batch size');
        }

        return $this;
    }
    public function getBoilTime(): ?int
    {
        return $this->boilTime;
    }
    public function setBoilTime(int $boilTime): self
    {
        if ($boilTime > 0) {
            $this->boilTime = $boilTime;
        } else {
            throw new \InvalidArgumentException('negative boil time');
        }

        return $this;
    }
    public function getEvaporationRatePercentage(): ?int
    {
        return $this->evaporationRatePercentage;
    }
    public function setEvaporationRatePercentage(int $evaporationRatePercentage): self
    {
        if ($evaporationRatePercentage > 0 || $evaporationRatePercentage < 100) {
            $this->evaporationRatePercentage = $evaporationRatePercentage;
        } else throw new \InvalidArgumentException('evaporation rate isn\'t in percent');

        return $this;
    }
    public function getGrainAbsorption(): ?float
    {
        return $this->grainAbsorption;
    }
    public function setGrainAbsorption(float $grainAbsorption): self
    {
        if ($grainAbsorption > 0) {
            $this->grainAbsorption = $grainAbsorption;
        } else throw new \InvalidArgumentException('negative or null grain absorption');

        return $this;
    }
    public function getOwner(): ?User
    {
        return $this->owner;
    }
    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
    /**
     * @return Collection|BeerRecipe[]
     */
    public function getBeerRecipes(): Collection
    {
        return $this->beerRecipes;
    }
    public function addBeerRecepe(BeerRecipe $beerRecepe): self
    {
        if (!$this->beerRecipes->contains($beerRecepe)) {
            $this->beerRecipes[] = $beerRecepe;
            $beerRecepe->setEquipment($this);
        }

        return $this;
    }
    public function removeBeerRecepe(BeerRecipe $beerRecepe): self
    {
        if ($this->beerRecipes->removeElement($beerRecepe)) {
            // set the owning side to null (unless already changed)
            if ($beerRecepe->getEquipment() === $this) {
                $beerRecepe->setEquipment(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
