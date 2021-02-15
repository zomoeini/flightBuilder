<?php

namespace App\Entity;

use App\Repository\FlightsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlightsRepository::class)
 */
class Flights
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $airline;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departure_airport;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departure_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrival_airport;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arrival_time;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAirline(): ?string
    {
        return $this->airline;
    }

    public function setAirline(string $airline): self
    {
        $this->airline = $airline;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDepartureAirport(): ?string
    {
        return $this->departure_airport;
    }

    public function setDepartureAirport(string $departure_airport): self
    {
        $this->departure_airport = $departure_airport;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departure_time;
    }

    public function setDepartureTime(\DateTimeInterface $departure_time): self
    {
        $this->departure_time = $departure_time;

        return $this;
    }

    public function getArrivalAirport(): ?string
    {
        return $this->arrival_airport;
    }

    public function setArrivalAirport(string $arrival_airport): self
    {
        $this->arrival_airport = $arrival_airport;

        return $this;
    }

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(\DateTimeInterface $arrival_time): self
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }
}
