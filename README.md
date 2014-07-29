Doctrine Examples
=================
This is a repository to show simple examples of how to do things with Doctrine.

I decided (for now) to just throw the examples into artisan commands.

# Examples

Entity Interactions: [src/ArtisanCommands](src/ArtisanCommands)

Entities: [src/Entities](src/Entities)

Value Objects: [src/ValueObjects](src/ValueObjects)

# Installation

1. Install Virtualbox, Vagrant, and Ansible
2. run `vagrant up`
3. run `composer install` inside the vm in the /vagrant folder
4. run `php artisan doctrine:schema:create`
5. run `php artisan app:add-member FNAME LNAME`
