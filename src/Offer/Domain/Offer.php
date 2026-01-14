<?php

declare(strict_types=1);

namespace App\Offer\Domain;

use DateTimeImmutable;

final class Offer
{
    private string $id;
    private string $title;
    private string $providerName;
    private string $utilityType;
    private float $pricePerMonth;
    private bool $isActive;
    private DateTimeImmutable $createdAt;
}
