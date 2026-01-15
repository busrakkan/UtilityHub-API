<?php
namespace App\Domain\Offer;

use App\Domain\Offer\Offer;

interface OfferRepositoryInterface
{
    public function save(Offer $offer): void;
    public function findById(string $id): ?Offer;
    public function findAll(): array;
    public function delete(Offer $offer): void;
}
