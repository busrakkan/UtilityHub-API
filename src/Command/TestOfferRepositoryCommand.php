<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestOfferRepositoryCommand extends Command
{
    protected static $defaultName = 'app:test-offer-repository';
    protected static $defaultDescription = 'Dummy Test';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Command registered successfully!');
        return Command::SUCCESS;
    }
}
