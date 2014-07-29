<?php namespace Example\ArtisanCommands;

use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

abstract class ArtisanCommand extends Command
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Create a new command instance.
     * @param EntityManager $entityManager
     * @return \Example\ArtisanCommands\ArtisanCommand
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    abstract public function fire();

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
