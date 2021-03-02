<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $timeStart;

    /**
     * @ORM\Column(type="date")
     */
    private $timeEnd;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $user;

    /**
     * @var Pitch
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Pitch", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pitch_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $pitch;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimeStart(): ?\DateTimeInterface
    {
        return $this->timeStart;
    }

    public function setTimeStart(\DateTimeInterface $timeStart): self
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function getTimeEnd(): ?\DateTimeInterface
    {
        return $this->timeEnd;
    }

    public function setTimeEnd(\DateTimeInterface $timeEnd): self
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Pitch
     */
    public function getPitch(): Pitch
    {
        return $this->pitch;
    }

    /**
     * @param Pitch $pitch
     */
    public function setPitch(Pitch $pitch): void
    {
        $this->pitch = $pitch;
    }
}
