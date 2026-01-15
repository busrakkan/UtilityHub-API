<?php
namespace App\Offer\Domain;

use App\Offer\Domain\Offer;

interface OfferRepositoryInterface
{
    public function save(Offer $offer): void;

    public function findById(string $id): ?Offer;

    public function findAll(): array;

    public function findAllActive(): array;  

    public function delete(Offer $offer): void;
}
