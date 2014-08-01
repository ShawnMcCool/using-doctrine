<?php namespace Example\ArtisanCommands;

use Example\Entities\MemberImage;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class AddImageToMemberCommand extends ArtisanCommand
{
    protected $name = 'app:add-image-to-member';
    protected $description = 'Add an image to a member';

    public function fire()
    {
        $member = $this->getMember();

        if ( ! $member) {
            $this->error('Sorry, a member with that ID could not be found');
        }

        try {
            $image = $member->addImage($this->argument('image_path'));

            $this->entityManager->persist($member);
            $this->entityManager->persist($image);
            $this->entityManager->flush();
        } catch(\Exception $e) {
            $this->error('There was an error attaching the image');
            var_dump($e->getMessage());
            return;
        }
    }

    private function getMember()
    {
        return $this->entityManager->find('Example\Entities\Member', $this->argument('member_id'));
    }

    protected function getArguments()
    {
        return [
            ['member_id', InputArgument::REQUIRED, 'member_id'],
            ['image_path', InputArgument::REQUIRED, 'image_path'],
        ];
    }
}
