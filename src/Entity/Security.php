<?php

namespace App\Entity;

use App\Repository\SecurityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecurityRepository::class)]
class Security
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $symbol = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $exchange = null;

    #[ORM\Column(length: 10)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeInterface $ipoDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $delistingDate = null;

    #[ORM\Column(length: 15)]
    private ?string $status = null;

    #[ORM\Column(length: 12)]
    private ?string $isin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getExchange(): ?string
    {
        return $this->exchange;
    }

    public function setExchange(string $exchange): static
    {
        $this->exchange = $exchange;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getIpoDate(): ?\DateTimeInterface
    {
        return $this->ipoDate;
    }

    public function setIpoDate(\DateTimeInterface $ipoDate): static
    {
        $this->ipoDate = $ipoDate;

        return $this;
    }

    public function getDelistingDate(): ?\DateTimeImmutable
    {
        return $this->delistingDate;
    }

    public function setDelistingDate(?\DateTimeImmutable $delistingDate): static
    {
        $this->delistingDate = $delistingDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getIsin(): ?string
    {
        return $this->isin;
    }

    public function setIsin(string $isin): static
    {
        $this->isin = $isin;

        return $this;
    }
}
