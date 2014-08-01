<?php namespace Example\ArtisanCommands;

use Example\Entities\Post;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class GetPostByIdCommand extends ArtisanCommand
{
    protected $name = 'app:get-post-by-id';
    protected $description = 'Get a post by ID';

    public function fire()
    {
        /** @var Post $post */
        $post = $this->entityManager->find('Example\Entities\Post', $this->argument('id'));

        if ( ! $post) {
            $this->error('Sorry, a post with that ID could not be found');
            return;
        }

        $author = $post->getAuthor();

        $this->info("post: {$post->getSubject()} - {$post->getBody()}");
        $this->info("\tauthor: {$author->getName()}");

        /** @var Tag $tag */
        foreach ($post->getTags() as $tag) {
            $this->info("\ttag: {$tag->getName()}");
        }
    }

    protected function getArguments()
    {
        return [
            ['id', InputArgument::REQUIRED, 'id'],
        ];
    }
}
