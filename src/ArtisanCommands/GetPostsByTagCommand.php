<?php namespace Example\ArtisanCommands;

use Example\Entities\Post;
use Example\Entities\Tag;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

// php artisan app:get-member-by-id <id>
final class GetPostsByTagCommand extends ArtisanCommand
{
    protected $name = 'app:get-posts-by-tag';
    protected $description = 'Get a list of posts by tag';

    public function fire()
    {
        $query = $this->entityManager->createQuery('SELECT t FROM Example\Entities\Tag t where t.name = :name');
        $query->setParameter('name', $this->argument('name'));
        /** @var Tag $tag */
        $result = $query->getResult();
        $tag = isset($result[0]) ? $result[0] : null;

        if ( ! $tag) {
            $this->error('Sorry, a tag with that name could not be found');
            return;
        }

        $this->info("tag: {$tag->getName()}");

        /** @var Post $post */
        foreach ($tag->getPosts() as $post) {
            $this->info("\tpost: {$post->getSubject()} - {$post->getBody()}");
            $author = $post->getAuthor();
            $this->info("\t\tauthor: {$author->getName()}");
        }
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'name'],
        ];
    }
}
