<?php

declare(strict_types=1);

namespace App\Offer\Domain;

use DateTimeImmutable;
use InvalidArgumentException;

final class Offer
{
    private string $id;
    private string $title;
    private string $providerName;
    private string $utilityType;
    private float $pricePerMonth;
    private bool $isActive;
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
}
