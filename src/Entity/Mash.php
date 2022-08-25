<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Exception\MashTypeException;
use App\Repository\MashRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;

#[
    ApiResource(
        collectionOperations: [
            'get',
            'post',
        ],
        itemOperations: [
            'get',
            'patch',
        ],
        normalizationContext: ['groups' => 'read'],
        denormalizationContext: ['groups' => 'write']
    )
]
#[ORM\Entity(repositoryClass: MashRepository::class)]

class Mash
{
    const TYPE_AVAILABLE = ['infusion', 'decoction'];

    /**
     * @Ignore()
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    #[Groups('read')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 255)]
    #[Groups(['read', 'write'])]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 511)]
    #[ApiProperty(identifier: true)]
    #[Gedmo\Slug(fields: ['name'])]
    #[Groups('read')]
    private $slug;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    #[Assert\Length(min: 3, max: 255)]
    #[Groups(['read', 'write'])]
    private ?string $type;

    #[ORM\ManyToOne(targetEntity: InfusionMashSteps::class)]
    #[Groups(['read', 'write'])]
    private ?InfusionMashSteps $infusionMashSteps;

    #[ORM\ManyToOne(targetEntity: DecoctionMashSteps::class)]
    #[Groups(['read', 'write'])]
    private ?DecoctionMashSteps $decoctionMashSteps;

    #[ORM\OneToMany(targetEntity: BeerRecipe::class, mappedBy: 'mash')]
    #[Groups(['read', 'write'])]
    private $beerRecipes;

    public function __construct()
    {
        $this->beerRecipes = new ArrayCollection();
    }

/*    public function __construct(string $name, string $slug, string $type)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->type = $type;
    }*/

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

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }



    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     * @throws MashTypeException
     */
    public function setType(string $type): self
    {
        if (in_array(strtolower(trim($type)), self::TYPE_AVAILABLE)) {
            $this->type = $type;
        } else {
            throw new MashTypeException('The selectionned type isn\'t approved');
        }

        return $this;
    }

    public function getInfusionMashSteps(): ?InfusionMashSteps
    {
        return $this->infusionMashSteps;
    }

    public function setInfusionMashSteps(?InfusionMashSteps $infusionMashSteps): self
    {
        $this->infusionMashSteps = $infusionMashSteps;

        return $this;
    }

    public function getDecoctionMashSteps(): ?DecoctionMashSteps
    {
        return $this->decoctionMashSteps;
    }

    public function setDecoctionMashSteps(?DecoctionMashSteps $decoctionMashSteps): self
    {
        $this->decoctionMashSteps = $decoctionMashSteps;

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
            $beerRecepe->setMash($this);
        }

        return $this;
    }

    public function removeBeerRecepe(BeerRecipe $beerRecepe): self
    {
        if ($this->beerRecipes->removeElement($beerRecepe)) {
            // set the owning side to null (unless already changed)
            if ($beerRecepe->getMash() === $this) {
                $beerRecepe->setMash(null);
            }
        }

        return $this;
    }
}
