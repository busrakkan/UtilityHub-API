<?php
namespace App\Offer\Infrastructure\Doctrine;

use App\Offer\Domain\Offer;
use App\Offer\Domain\OfferRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class OfferRepository implements OfferRepositoryInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function save(Offer $offer): void
    {
        $this->em->persist($offer);
        $this->em->flush();
    }

    public function findById(string $id): ?Offer
    {
        return $this->em->getRepository(Offer::class)->find($id);
    }

    public function findAll(): array
    {
        return $this->em->getRepository(Offer::class)->findAll();
    }

    public function delete(Offer $offer): void
    {
        $this->em->remove($offer);
        $this->em->flush();
    }

    public function findAllActive(): array
    {
        return $this->em->getRepository(Offer::class)
            ->createQueryBuilder('o')
            ->where('o.is_active = :active')
            ->setParameter('active', true)
            ->getQuery()
            ->getResult();
    }
}
