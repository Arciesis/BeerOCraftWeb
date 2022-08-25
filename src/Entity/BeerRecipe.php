<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\BeerRecipeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    collectionOperations: [
        'get',
        'post',
    ],
    itemOperations: [
        'get',
        'put',
    ]
)]
#[ORM\Entity(repositoryClass: BeerRecipeRepository::class)]

class BeerRecipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 255)]
    private string $name;

    #[ORM\Column(type: 'boolean', nullable: false)]
    #[Assert\NotNull]
    private bool $isPublic;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'beerRecipes')]
    private ?Collection $logicalOwner;

    #[ORM\ManyToOne(targetEntity: BoilerEquipment::class, inversedBy: 'beerRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    private BoilerEquipment $equipment;

    #[ORM\ManyToOne(targetEntity: BeerStyle::class, inversedBy: 'beerRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    private BeerStyle $style;

    #[ORM\ManyToMany(targetEntity: Fermentable::class, inversedBy: 'beerRecipes')]
    private ?Collection $fermentables;

    #[ORM\ManyToMany(targetEntity: Hop::class, inversedBy: 'beerRecipes')]
    private ?Collection $hops;

    #[ORM\ManyToOne(targetEntity: Yeast::class, inversedBy: 'beerRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    private Yeast $yeast;

    #[ORM\ManyToOne(targetEntity: Mash::class, inversedBy: 'beerRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    private Mash $mash;

    #[ORM\Column(type: 'float', nullable: false)]
    #[Assert\NotNull]
    private float $targetBatchSize;

    #[ORM\Column(type: 'float', nullable: false)]
    #[Assert\NotNull]
    private float $targetBoilSize;

    #[ORM\Column(type: 'float', nullable: false)]
    #[Assert\NotNull]
    private float $boilTime;

    #[ORM\Column(type: 'float', nullable: false)]
    #[Assert\NotNull]
    private float $specificGravity;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'myBeersRecipes' ,cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false, unique: false)]
    private ?User $realOwner;

    #[ORM\Column(length: 255)]
    #[ApiProperty(identifier: true)]
    #[Slug(fields: ['name'])]
    private ?string $slug = null;

    public function __construct()
    {
        $this->logicalOwner = new ArrayCollection();
        $this->fermentables = new ArrayCollection();
        $this->hops = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIsPublic(): ?bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getLogicalOwner(): Collection
    {
        return $this->logicalOwner;
    }

    public function addLogicalOwner(User $owner): self
    {
        if (!$this->logicalOwner->contains($owner)) {
            $this->logicalOwner[] = $owner;
        }

        return $this;
    }

    public function removeLogicalOwner(User $owner): self
    {
        $this->logicalOwner->removeElement($owner);

        return $this;
    }

    public function getEquipment(): ?BoilerEquipment
    {
        return $this->equipment;
    }

    public function setEquipment(?BoilerEquipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getStyle(): ?BeerStyle
    {
        return $this->style;
    }

    public function setStyle(?BeerStyle $style): self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @return Collection|Fermentable[]
     */
    public function getFermentables(): Collection
    {
        return $this->fermentables;
    }

    public function addFermentable(Fermentable $fermentable): self
    {
        if (!$this->fermentables->contains($fermentable)) {
            $this->fermentables[] = $fermentable;
        }

        return $this;
    }

    public function removeFermentable(Fermentable $fermentable): self
    {
        $this->fermentables->removeElement($fermentable);

        return $this;
    }

    /**
     * @return Collection|Hop[]
     */
    public function getHops(): Collection
    {
        return $this->hops;
    }

    public function addHop(Hop $hop): self
    {
        if (!$this->hops->contains($hop)) {
            $this->hops[] = $hop;
        }

        return $this;
    }

    public function removeHop(Hop $hop): self
    {
        $this->hops->removeElement($hop);

        return $this;
    }

    public function getYeast(): ?Yeast
    {
        return $this->yeast;
    }

    public function setYeast(?Yeast $yeast): self
    {
        $this->yeast = $yeast;

        return $this;
    }

    public function getMash(): ?Mash
    {
        return $this->mash;
    }

    public function setMash(?Mash $mash): self
    {
        $this->mash = $mash;

        return $this;
    }

    public function getTargetBatchSize(): ?float
    {
        return $this->targetBatchSize;
    }

    public function setTargetBatchSize(float $targetBatchSize): self
    {
        $this->targetBatchSize = $targetBatchSize;

        return $this;
    }

    public function getTargetBoilSize(): ?float
    {
        return $this->targetBoilSize;
    }

    public function setTargetBoilSize(float $targetBoilSize): self
    {
        $this->targetBoilSize = $targetBoilSize;

        return $this;
    }

    public function getBoilTime(): ?float
    {
        return $this->boilTime;
    }

    public function setBoilTime(float $boilTime): self
    {
        $this->boilTime = $boilTime;

        return $this;
    }

    public function getSpecificGravity(): ?float
    {
        return $this->specificGravity;
    }

    public function setSpecificGravity(float $specificGravity): self
    {
        $this->specificGravity = $specificGravity;

        return $this;
    }

    public function getRealOwner(): ?User
    {
        return $this->realOwner;
    }

    public function setRealOwner(?User $realOwner): self
    {
        $this->realOwner = $realOwner;

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
