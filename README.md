Doctrine Examples
=================
This is a repository to show simple examples of how to do things with Doctrine.

I decided (for now) to just throw the examples into artisan commands.

# Folder Breakdown

These files are arranged in this way NOT because this is how they'd be arranged in an application. But, rather to simplify and express the distinction between roles for the purpose of the examples.

- Orchestrated Interactions: [src/ArtisanCommands](src/ArtisanCommands)
- Entities: [src/Entities](src/Entities)
- Value Objects: [src/ValueObjects](src/ValueObjects)

# Installation

If you'd like to run these examples locally, a virtual machine configuration is included.

1. clone this repo down with `git clone --recursive git@github.com:ShawnMcCool/doctrine-examples.git`
2. Install Virtualbox, Vagrant, and Ansible
3. run `vagrant up`
4. run `composer install` inside the vm in the /vagrant folder
5. run `php artisan doctrine:schema:create`
6. run any command you'd like, you probably should start with `php artisan app:add-member FNAME LNAME`

# Terms

An **Entity** is fundamentally defined not by its attributes, but rather by a thread of continuity and identity. Two people may live in the same place and have the same name and even the same phone number, but they are two unique people with unique identities. Their 'selves' will not change even if they change their names. Objects that are referred to by an ID by default have identities (ID = identity) and are therefore entities. In this repository, an example is a [Member](blob/master/src/Entities/Member.php).

A **Value Object** is an object that describes some characteristics of a thing but that itself doesn't have a conceptual identity. In this repository, an example is a [Name](blob/master/src/ValueObjects/Name.php).

# Examples

## Persisting Entities

## Embedding a Value Object in an Entity

## Attaching Related Entities

## Querying Entities by Identity

## Querying Entities by Attributes

## Sorting in Entity Queries by Attributes
