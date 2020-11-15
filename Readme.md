**A project based on Symfony 4.4**

Requirements
-----------------
* MYSQL 5.7;
* PHP 7.2.34 or higher;
* and the usual Symfony application requirements.

Installation
========================

1. Clone or download repository

        https://github.com/andrri26/bank_draft.git

2. Run composer

	    composer install

3. Edit .env file and configure database user and password

	    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/bank?serverVersion=5.7

4. Create the database "bank"

        php bin/console doctrine:database:create
    
5. Migrate the database

        php bin/console doctrine:migration:migrate
    
6. Run server and go to http://localhost:8000/ or setup a Virtualhost on Apache server
    
        php -S localhost:8000 -t public
        
