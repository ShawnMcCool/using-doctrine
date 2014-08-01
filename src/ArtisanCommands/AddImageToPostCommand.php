<?php namespace Example\ArtisanCommands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class AddImageToPostCommand extends ArtisanCommand
{
    protected $name = 'app:add-image-to-post';
    protected $description = 'Add an image to a post';

    public function fire()
    {
        $post = $this->getPost();

        if ( ! $post) {
            $this->error('Sorry, a post with that ID could not be found');
        }

        try {
            $image = $post->setImage($this->argument('image_path'));

            $this->entityManager->persist($post);
            $this->entityManager->persist($image);
            $this->entityManager->flush();
        } catch(\Exception $e) {
            $this->error('There was an error attaching the image');
            var_dump($e->getMessage());
            return;
        }
    }

    private function getPost()
    {
        return $this->entityManager->find('Example\Entities\Post', $this->argument('post_id'));
    }

    protected function getArguments()
    {
        return [
            ['post_id', InputArgument::REQUIRED, 'post_id'],
            ['image_path', InputArgument::REQUIRED, 'image_path'],
        ];
    }
}
