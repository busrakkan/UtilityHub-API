<?php
namespace App\Offer\Domain\Infrastructure\Doctrine;

use App\Offer\Domain\OfferRepositoryInterface;
use Doctrine\DBAL\Connection;

abstract class OfferRepository implements OfferRepositoryInterface
{
    private Connection $conn;

    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    public function findById(string $id): ?Offer
    {
        $data = $this->conn->fetchAssociative('SELECT * FROM offers WHERE id = ?', [$id]);

        if (!$data) {
            return null;
        }

        // Map database row to Offer object
        return new Offer(
            $data['id'],
            $data['title'],
            $data['providerName'],
            $data['utilityType'],
            (float) $data['pricePerMonth']
        );
    }


    public function findAllActive(): array
    {
        $rows = $this->conn->fetchAllAssociative('SELECT * FROM offers WHERE is_active = 1');

        $offers = [];
        foreach ($rows as $data) {
            $offers[] = new Offer(
                $data['id'],
                $data['title'],
                $data['providerName'],
                $data['utilityType'],
                (float) $data['pricePerMonth']
            );
        }

        return $offers;
    }

}
