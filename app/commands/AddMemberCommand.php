<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AddMemberCommand extends Command {

	/**
	 * The console command name.
	 * @var string
	 */
	protected $name = 'app:add-member';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Add a member';

    /**
     * Create a new command instance.
     * @return \AddMemberCommand
     */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 * @return mixed
	 */
	public function fire()
	{
        $name = new Name($this->argument('first_name'), $this->argument('last_name'));
        $member = new Member($name);

        EntityManager::persist($member);
        EntityManager::flush();

        $queriedMember = EntityManager::find('Member', $member->getId());

        $this->info("Member created with name: " . $queriedMember->getFullName());
	}

	/**
	 * Get the console command arguments.
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['first_name', InputArgument::REQUIRED, 'first_name'],
			['last_name', InputArgument::REQUIRED, 'last name'],
		];
	}

	/**
	 * Get the console command options.
	 * @return array
	 */
	protected function getOptions()
	{
		return [
		];
	}

}
