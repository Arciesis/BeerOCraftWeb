<?php

namespace App\Entity;

use App\Repository\FermentableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FermentableRepository::class)
 */
class Fermentable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $humidity;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $grindExtract;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $totalProt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $solubleProt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $kolbachIndex;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $fan;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ebc;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $kz;

    /**
     * @ORM\Column(type="smallint")
     */
    private $saccharification;

    /**
     * @ORM\Column(type="integer")
     */
    private $distaticPower;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $ph;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $fiability;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $homogeneity;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $viscosity;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Bglucane;

    /**
     * @ORM\Column(type="smallint")
     */
    private $limitAttenuation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(?int $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getGrindExtract(): ?int
    {
        return $this->grindExtract;
    }

    public function setGrindExtract(?int $grindExtract): self
    {
        $this->grindExtract = $grindExtract;

        return $this;
    }

    public function getTotalProt(): ?int
    {
        return $this->totalProt;
    }

    public function setTotalProt(?int $totalProt): self
    {
        $this->totalProt = $totalProt;

        return $this;
    }

    public function getSolubleProt(): ?int
    {
        return $this->solubleProt;
    }

    public function setSolubleProt(?int $solubleProt): self
    {
        $this->solubleProt = $solubleProt;

        return $this;
    }

    public function getKolbachIndex(): ?int
    {
        return $this->kolbachIndex;
    }

    public function setKolbachIndex(?int $kolbachIndex): self
    {
        $this->kolbachIndex = $kolbachIndex;

        return $this;
    }

    public function getFan(): ?int
    {
        return $this->fan;
    }

    public function setFan(?int $fan): self
    {
        $this->fan = $fan;

        return $this;
    }

    public function getEbc(): ?int
    {
        return $this->ebc;
    }

    public function setEbc(int $ebc): self
    {
        $this->ebc = $ebc;

        return $this;
    }

    public function getKz(): ?int
    {
        return $this->kz;
    }

    public function setKz(?int $kz): self
    {
        $this->kz = $kz;

        return $this;
    }

    public function getSaccharification(): ?int
    {
        return $this->saccharification;
    }

    public function setSaccharification(int $saccharification): self
    {
        $this->saccharification = $saccharification;

        return $this;
    }

    public function getDistaticPower(): ?int
    {
        return $this->distaticPower;
    }

    public function setDistaticPower(int $distaticPower): self
    {
        $this->distaticPower = $distaticPower;

        return $this;
    }

    public function getPh(): ?int
    {
        return $this->ph;
    }

    public function setPh(?int $ph): self
    {
        $this->ph = $ph;

        return $this;
    }

    public function getFiability(): ?int
    {
        return $this->fiability;
    }

    public function setFiability(?int $fiability): self
    {
        $this->fiability = $fiability;

        return $this;
    }

    public function getHomogeneity(): ?int
    {
        return $this->homogeneity;
    }

    public function setHomogeneity(?int $homogeneity): self
    {
        $this->homogeneity = $homogeneity;

        return $this;
    }

    public function getViscosity(): ?int
    {
        return $this->viscosity;
    }

    public function setViscosity(?int $viscosity): self
    {
        $this->viscosity = $viscosity;

        return $this;
    }

    public function getBglucane(): ?int
    {
        return $this->Bglucane;
    }

    public function setBglucane(?int $Bglucane): self
    {
        $this->Bglucane = $Bglucane;

        return $this;
    }

    public function getLimitAttenuation(): ?int
    {
        return $this->limitAttenuation;
    }

    public function setLimitAttenuation(int $limitAttenuation): self
    {
        $this->limitAttenuation = $limitAttenuation;

        return $this;
    }
}
