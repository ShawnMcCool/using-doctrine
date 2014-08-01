<?php namespace Example\ArtisanCommands;

use EntityManager;
use Example\Entities\Member;
use Example\Entities\Post;
use Example\Entities\Tag;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

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

        $this->info("member: {$member->getId()} {$member->getName()}");

        /** @var Post $post */
        foreach ($member->getPosts() as $post) {
            $this->info("\tpost: {$post->getId()} {$post->getSubject()} - {$post->getBody()}");
            /** @var Tag $tag */
            foreach ($post->getTags() as $tag) {
                $this->info("\t\ttag: {$tag->getName()}");
            }
        }
    }

    protected function getArguments()
    {
        return [
            ['id', InputArgument::REQUIRED, 'id'],
        ];
    }
}
