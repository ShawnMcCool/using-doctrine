<?php namespace Example\ArtisanCommands;

use Example\Entities\Tag;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class AddTagToPostCommand extends ArtisanCommand
{
    protected $name = 'app:add-tag-to-post';
    protected $description = 'Add a tag to a post';

    public function fire()
    {
        $post = $this->getPost();

        if ( ! $post) {
            $this->error('Sorry, a post with that ID could not be found');
            return;
        }

        try {
            $tag = $this->getTag();
            $post->addTag($tag);

            $this->entityManager->persist($post);
            $this->entityManager->flush();
        } catch(\Exception $e) {
            $this->error('There was an error attaching the tag');
        }
    }

    private function getPost()
    {
        return $this->entityManager->find('Example\Entities\Post', $this->argument('post_id'));
    }

    private function getTag()
    {
        $query = $this->entityManager->createQuery('SELECT t FROM Example\Entities\Tag t where t.name = :name');
        $query->setParameter('name', $this->argument('tag_name'));
        $tag = $query->getFirstResult();

        if ( ! $tag) {
            $tag = new Tag($this->argument('tag_name'));
            $this->entityManager->persist($tag);
            $this->entityManager->flush();
        }

        return $tag;
    }

    protected function getArguments()
    {
        return [
            ['post_id', InputArgument::REQUIRED, 'post_id'],
            ['tag_name', InputArgument::REQUIRED, 'tag_name'],
        ];
    }
}
