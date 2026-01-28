<?php
// test_offer_repository.php

declare(strict_types=1);

use App\Offer\Domain\OfferRepositoryInterface;
use App\Kernel;

require __DIR__ . '/vendor/autoload.php';

// Boot the Symfony kernel
$kernel = new Kernel('dev', true);
$kernel->boot();

// Get the container
$container = $kernel->getContainer();

// Fetch the repository via the interface
/** @var OfferRepositoryInterface $repo */
$repo = $container->get(OfferRepositoryInterface::class);

// Test findById
$id = 'some-id'; // replace with a real ID from your database if needed
$offer = $repo->findById($id);
echo "findById('$id') result:\n";
var_dump($offer);
echo "\n";

// Test findAllActive
$activeOffers = $repo->findAllActive();
echo "findAllActive() result:\n";
print_r($activeOffers);

$kernel->shutdown();
