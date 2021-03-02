<?php

namespace App\Entity;

use App\Repository\PitchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PitchRepository::class)
 */
class Pitch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=127)
     */
    private $dimensions;

    /**
     * @ORM\Column(type="boolean")
     */
    private $miniGoals;

    /**
     * @ORM\Column(type="boolean")
     */
    private $balls;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getMiniGoals(): ?bool
    {
        return $this->miniGoals;
    }

    public function setMiniGoals(bool $miniGoals): self
    {
        $this->miniGoals = $miniGoals;

        return $this;
    }

    public function getBalls(): ?bool
    {
        return $this->balls;
    }

    public function setBalls(bool $balls): self
    {
        $this->balls = $balls;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }
}
