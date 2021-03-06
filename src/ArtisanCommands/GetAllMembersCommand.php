<?php namespace Example\ArtisanCommands;

use EntityManager;
use Example\Entities\Member;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class GetAllMembersCommand extends ArtisanCommand
{
    protected $name = 'app:get-all-members';
    protected $description = 'Get all members';

    public function fire()
    {
        $members = $this->entityManager->createQuery('SELECT m FROM Example\Entities\Member m')->getResult();

        /** @var Member $member */
        foreach ($members as $member) {
            $this->info($member->getId() . ' ' . $member->getName());
        }
    }
}
