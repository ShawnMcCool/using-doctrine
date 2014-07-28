doctrine-examples
=================
This is a repository to show simple examples of how to do things with Doctrine.

I'm using things like Laravel facades to keep it as simple as possible. I'm adding no namespaces, etc. These details may change later, but I'll update this document accordingly.

Find examples here: In the Artisan Commands folder

Find classes dumped here: In the models folder (these will probably be moved and organized later)

# Installation
1. Install Virtualbox, Vagrant, and Ansible
2. run `vagrant up`
3. run `composer install` inside the vm in the /vagrant folder
4. run `php artisan doctrine:schema:create`
5. run `php artisan app:add-member FNAME LNAME`
