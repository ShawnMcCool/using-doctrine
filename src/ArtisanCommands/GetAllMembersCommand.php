<?php namespace Example\ArtisanCommands;

use EntityManager;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class GetAllMembersCommand extends ArtisanCommand
{
    protected $name = 'app:get-all-members';
    protected $description = 'Get all members';

    public function fire()
    {
    }
}
