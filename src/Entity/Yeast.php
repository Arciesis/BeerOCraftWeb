<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Exception\IngredientTypeException;
use App\Repository\YeastRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity(repositoryClass: YeastRepository::class)]

class Yeast
{
    private const TYPE = ['liquid', 'dry'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    private $type;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    private $viability;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    private $tempMin;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    private $tempMax;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    private $name;

    #[ORM\OneToMany(targetEntity: BeerRecipe::class, mappedBy: 'yeast')]
    private $beerRecipes;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    #[ApiProperty(identifier: true)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->beerRecipes = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getType(): ?string
    {
        return $this->type;
    }
    public function setType(string $type): self
    {
        if (in_array($type, self::TYPE)){
        $this->type = $type;
        } else throw new IngredientTypeException('try to set a type that does not exist');
        return $this;
    }
    public function getViability(): ?int
    {
        return $this->viability;
    }
    public function setViability(int $viability): self
    {
        $this->viability = $viability;

        return $this;
    }
    public function getTempMin(): ?int
    {
        return $this->tempMin;
    }
    public function setTempMin(int $tempMin): self
    {
        $this->tempMin = $tempMin;

        return $this;
    }
    public function getTempMax(): ?int
    {
        return $this->tempMax;
    }
    public function setTempMax(int $tempMax): self
    {
        $this->tempMax = $tempMax;

        return $this;
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
            $beerRecepe->setYeast($this);
        }

        return $this;
    }
    public function removeBeerRecepe(BeerRecipe $beerRecepe): self
    {
        if ($this->beerRecipes->removeElement($beerRecepe)) {
            // set the owning side to null (unless already changed)
            if ($beerRecepe->getYeast() === $this) {
                $beerRecepe->setYeast(null);
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
