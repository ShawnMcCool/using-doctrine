<?php namespace Example\ArtisanCommands;

use EntityManager;
use Example\Entities\Member;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

// php artisan app:get-member-by-id <id>
final class GetMemberByIdCommand extends ArtisanCommand
{
    protected $name = 'app:get-member-by-id';
    protected $description = 'Get a member by ID.';

    public function fire()
    {
        /** @var Member $member */
        $member = $this->entityManager->find('Example\Entities\Member', $this->argument('id'));

        if ( ! $member) {
            $this->error('Sorry, a member with that ID could not be found');
            return;
        }

        $this->info($member->getId() . ' ' . $member->getName());

        /** @var \Example\Entities\Post $post */
        foreach ($member->getPosts() as $post) {
            $this->info("\t" . $post->getSubject() . ' - ' . $post->getBody());
        }
    }

    protected function getArguments()
    {
        return [
            ['id', InputArgument::REQUIRED, 'id'],
        ];
    }
}
