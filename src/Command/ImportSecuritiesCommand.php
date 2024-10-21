<?php

namespace App\Command;

use App\Core\Service\ImportSecurities\ImportSecuritiesService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\InputBag;

#[AsCommand(
    name: 'app:import:securities',
    description: 'Import securities data. Get new securities data and update the database',
)]
class ImportSecuritiesCommand extends Command
{
    public function __construct(private ImportSecuritiesService $service)
    {
        parent::__construct();
    }

    protected function configure(): void {}

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        echo "command import securities started \n";
        $this->service->run();


        return Command::SUCCESS;
    }
}
