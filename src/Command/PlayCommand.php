<?php

namespace App\Command;

use App\Core\Interface\DataProviderInterface;
use App\DataProvider\Endpoint\ListingDelistingStatusEndpoint;
use App\DataProvider\Endpoint\ListingDelistingStatusParams;
use App\DataProvider\Endpoint\StateParam;
use App\Service\MessageGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpClient\UriTemplateHttpClient;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'play',
    description: 'Add a short description for your command',
)]
class PlayCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }



    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        return Command::SUCCESS;
    }
}

class A
{
    public  function __construct(public string $name) {}
}
