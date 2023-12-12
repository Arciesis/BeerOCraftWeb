<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Exception\IngredientTypeException;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity(repositoryClass: HopRepository::class)]

class Hop
{
    private const TYPE = ['pellet', 'cones'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    private $id;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    #[Assert\Range(min: 0, max: 100)]
    private $alphaAcide;

    #[ORM\Column(type: 'smallint')]
    #[Assert\NotNull]
    #[Assert\Range(min: 0, max: 100)]
    private $betaAcide;

//    #[ORM\Column(type: 'string', length: 255)]
//    #[Assert\NotNull]
//    private $form;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $humulene;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $caryophyllene;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $cohumulone;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $Myrcene;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $polyphenole;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    private $type;

    #[ORM\ManyToMany(targetEntity: BeerRecipe::class, mappedBy: 'hops')]
    private $beerRecipes;

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

    public function getAlphaAcide(): ?int
    {
        return $this->alphaAcide;
    }

    public function setAlphaAcid(int $alphaAcid): self
    {
        $this->alphaAcide = $alphaAcid;

        return $this;
    }

    public function getBetaAcide(): ?int
    {
        return $this->betaAcide;
    }

    public function setBetaAcid(int $betaAcid): self
    {
        $this->betaAcide = $betaAcid;

        return $this;
    }

//    public function getForm(): ?string
//    {
//        return $this->form;
//    }
//
//    public function setForm(string $form): self
//    {
//        $this->form = $form;
//
//        return $this;
//    }

    public function getHumulene(): ?int
    {
        return $this->humulene;
    }

    public function setHumulene(?int $humulene): self
    {
        $this->humulene = $humulene;

        return $this;
    }

    public function getCaryophyllene(): ?int
    {
        return $this->caryophyllene;
    }

    public function setCaryophyllene(?int $caryophyllene): self
    {
        $this->caryophyllene = $caryophyllene;

        return $this;
    }

    public function getCohumulone(): ?int
    {
        return $this->cohumulone;
    }

    public function setCohumulone(?int $cohumulone): self
    {
        $this->cohumulone = $cohumulone;

        return $this;
    }

    public function getMyrcene(): ?int
    {
        return $this->Myrcene;
    }

    public function setMyrcene(?int $Myrcene): self
    {
        $this->Myrcene = $Myrcene;

        return $this;
    }

    public function getPolyphenole(): ?int
    {
        return $this->polyphenole;
    }

    public function setPolyphenole(?int $polyphenole): self
    {
        $this->polyphenole = $polyphenole;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @throws IngredientTypeException
     */
    public function setType(string $type): self
    {
        if (in_array($type, self::TYPE)){
            $this->type = $type;
        }else throw new IngredientTypeException('try to set a type that does not exist');
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
            $beerRecepe->addHop($this);
        }

        return $this;
    }
    public function removeBeerRecepe(BeerRecipe $beerRecepe): self
    {
        if ($this->beerRecipes->removeElement($beerRecepe)) {
            $beerRecepe->removeHop($this);
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
