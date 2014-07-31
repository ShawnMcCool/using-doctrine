<?php namespace Example\ArtisanCommands;

use Example\Entities\Member;
use Example\ValueObjects\Name;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class AddMemberCommand extends ArtisanCommand
{
    protected $name = 'app:add-member';
    protected $description = 'Add a member';

    public function fire()
    {
        $name = new Name($this->argument('first_name'), $this->argument('last_name'));
        $member = new Member($name);

        $this->entityManager->persist($member);
        $this->entityManager->flush();

        $this->info("Member # {$member->getId()} created with name: {$member->getName()}");
    }

    protected function getArguments()
    {
        return [
            ['first_name', InputArgument::REQUIRED, 'first_name'],
            ['last_name', InputArgument::REQUIRED, 'last name'],
        ];
    }
}
