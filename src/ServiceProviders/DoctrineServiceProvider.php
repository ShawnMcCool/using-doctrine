<?php namespace Example\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Doctrine\DBAL\Types\Type;

class DoctrineServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        Type::addType('memberid', 'Example\DBALTypes\MemberId');
    }
}