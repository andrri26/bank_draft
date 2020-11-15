**Un projet basé sur Symfony 4.4**

Exigences
-----------------
* MYSQL 5.7 ;
* PHP 7.2.34 ou supérieur ;
* et les exigences habituelles de l'application Symfony.

Installation
========================

1. Cloner ou télécharger le dépôt

        https://github.com/andrri26/bank_draft.git

2. Lancer composer

	    composer install

3. Modifier le fichier .env et configurer l'utilisateur et le mot de passe de la base de données 

	    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/bank?serverVersion=5.7

4. Créer la base de données "bank"

        php bin/console doctrine:database:create
    
5. Migrer la base de données

        php bin/console doctrine:migration:migrate
    
6. Exécutez le serveur et allez sur http://localhost:8000/ ou mettre en place un Virtualhost sur un serveur Apache
    
        php -S localhost:8000 -t public
        
