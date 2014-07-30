<?php namespace Example\ArtisanCommands;

use EntityManager;
use Example\Entities\Member;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

// php artisan app:sort-all-members
final class SortAllMembersCommand extends ArtisanCommand
{
    protected $name = 'app:sort-all-members';
    protected $description = 'Sort members by last name.';

    public function fire()
    {
        $members = $this->entityManager->createQuery('SELECT m FROM Example\Entities\Member m order by m.name.lastName desc')->getResult();

        /** @var Member $member */
        foreach ($members as $member) {
            $this->info($member->getId() . ' ' . $member->getName());
        }
    }
}
