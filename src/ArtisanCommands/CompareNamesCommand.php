<?php namespace Example\ArtisanCommands;

use Example\ValueObjects\Name;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

final class CompareNamesCommand extends ArtisanCommand
{
    protected $name = 'app:compare-names';
    protected $description = 'Compare Name objects';

    public function fire()
    {
        $name1 = new Name('foo', 'bar');
        $name2 = new Name('bar', 'baz');
        $name3 = new Name('foo', 'bar');

        if ($name1->equals($name2)) {
            $this->info("{$name1} equals {$name2}");
        } else {
            $this->error("{$name1} does not equal {$name2}");
        }

        if ($name1->equals($name3)) {
            $this->info("{$name1} equals {$name3}");
        } else {
            $this->error("{$name1} does not equal {$name3}");
        }
    }
}
