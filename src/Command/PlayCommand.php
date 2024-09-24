<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'play',
    description: 'Add a short description for your command',
)]
class PlayCommand extends Command
{
    public function __construct(private SerializerInterface $serializer)
    {
        parent::__construct();
    }



    protected function execute(InputInterface $input, OutputInterface $output): int
    {

      $this->serializer->deserialize('[{}]', A::class.'[]', 'json',
          );
      return Command::SUCCESS;
    }
}

class A{
    public  function __construct(public string $name)
    {

    }
}
