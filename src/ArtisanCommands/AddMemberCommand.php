<?php namespace Example\ArtisanCommands;

use EntityManager;
use Example\Entities\Member;
use Example\ValueObjects\Name;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AddMemberCommand extends ArtisanCommand
{
    protected $name = 'app:add-member';
    protected $description = 'Add a member';

    public function fire()
    {
        $name = new Name($this->argument('first_name'), $this->argument('last_name'));
        $member = new Member($name);

        EntityManager::persist($member);
        EntityManager::flush();

        $queriedMember = EntityManager::find('Example\Entities\Member', $member->getId());

        $this->info("Member created with name: " . $queriedMember->getName());
    }

    protected function getArguments()
    {
        return [
            ['first_name', InputArgument::REQUIRED, 'first_name'],
            ['last_name', InputArgument::REQUIRED, 'last name'],
        ];
    }
}
