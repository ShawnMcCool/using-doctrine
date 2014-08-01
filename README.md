Using Doctrine ORM 2.5
=================
This repository serves to highlight examples of how to accomplish various things with the Doctrine ORM version 2.5. For simplicity and interactivity, the actual code that would typically exist in the service layer is very unceremoniously dumped into artisan commands in [src/ArtisanCommands](src/ArtisanCommands).

Doctrine is essentially a PHP implementation of the [Hibernate ORM](http://hibernate.org/orm/). Doctrine implements the [Data Mapper pattern](http://martinfowler.com/eaaCatalog/dataMapper.html) for the purpose of object-relational mapping. Data Mapper's biggest distinction from the [Active Record pattern](http://www.martinfowler.com/eaaCatalog/activeRecord.html) in that Active Record entities are directly tied to a database table record and contain all of the behavior for interacting with the record within the entity itself, tying persistence behavior to the domain behavior of the object.

Please feel free to criticize the information or techniques in this repository by submitting an [issue](https://github.com/ShawnMcCool/doctrine-examples/issues) or a [pull-request](https://github.com/ShawnMcCool/doctrine-examples/pulls).

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

An **Entity** is fundamentally defined not by its attributes, but rather by a thread of continuity and identity. Two people may live in the same place and have the same name and even the same phone number, but they are two unique people with unique identities. Their 'selves' will not change even if they change their names. Objects that are referred to by an ID by default have identities (ID = identity) and are therefore entities (Evans 2003). In this repository, an example is a [member](src/Entities/Member.php).

A **Value Object** is an object that describes some characteristics of a thing but that itself doesn't have a conceptual identity (Evans 2003). In this repository, an example is a [person's name](src/ValueObjects/Name.php).

# Examples

## Persisting Entities

## Embedding a Value Object in an Entity

## Attaching Related Entities

## Querying Entities by Identity

## Querying Entities by Attributes

## Sorting in Entity Queries by Attributes
