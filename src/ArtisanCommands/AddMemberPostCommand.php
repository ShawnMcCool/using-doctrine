<?php namespace Example\ArtisanCommands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class AddMemberPostCommand extends ArtisanCommand
{
    protected $name = 'app:add-member-post';
    protected $description = 'Add a member post';

    public function fire()
    {
        $member = $this->entityManager->find('Example\Entities\Member', $this->argument('member_id'));

        if ( ! $member) {
            $this->error('Sorry, a member with that ID could not be found');
            return;
        }

        $post = $member->addPost($this->argument('post_subject'), $this->argument('post_body'));

        $this->entityManager->persist($member);
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }

    protected function getArguments()
    {
        return [
            ['member_id', InputArgument::REQUIRED, 'member_id'],
            ['post_subject', InputArgument::REQUIRED, 'post_subject'],
            ['post_body', InputArgument::REQUIRED, 'post_body'],
        ];
    }
}
