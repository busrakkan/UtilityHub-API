<?php

declare(strict_types=1);

namespace App\Offer\Domain;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

#[ORM\Entity]
#[ORM\Table(name: 'offers')]
final class Offer
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(length: 255)]
    private string $providerName;

    #[ORM\Column(length: 50)]
    private string $utilityType;

    #[ORM\Column(type: 'float')]
    private float $pricePerMonth;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $createdAt;

    public function __construct(
        string $id,
        string $title,
        string $providerName,
        string $utilityType,
        float $pricePerMonth
    ) {
        if ($pricePerMonth <= 0) {
            throw new InvalidArgumentException('Price per month must be positive.');
        }

        $this->id = $id;
        $this->title = $title;
        $this->providerName = $providerName;
        $this->utilityType = $utilityType;
        $this->pricePerMonth = $pricePerMonth;
        $this->isActive = true;
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }

    public function getUtilityType(): string
    {
        return $this->utilityType;
    }

    public function getPricePerMonth(): float
    {
        return $this->pricePerMonth;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

}
