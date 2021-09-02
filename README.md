# Gusto Coffe

Alexis RÉAU, Cédric BAUSSERON, ERIC CICCOTTI
Ce projet à été réaliser avec Symfony et ApiPlatform https://api-platform.com/

# URL

https://www.f2i-dev14-gq-gd-fh.fr/

### Commande SYMFONY pour le projet

## Créer la base de donnée :

### `symfony console doctrine:database:drop --force`

Suppression de la base de donnée si déja créee

### `symfony console doctrine:database:create`

Creation de la base de donnée "gustocoffe-database"

### `symfony console make:migration`

/!\ Execution des migrations à partir des entités , supprimer le contenu du fichier en cas d'erreur

### `symfony console doctrine:migrations:migrate `

Executions des migrations

### `php bin/console hautelook:fixtures:load `

Lancement des fixtures pour charger des jeux de donnée fictif dans la base de donnée

Si il y a une erreur vider le cache :

### `php bin/console cache:clear`

## Lancer le projet en local

aller dans le dossier gustocoffe_api et lancer

### `symfony serve`

L'application va se lancer sur le port http://localhost:8000

pour voir ApiPlatform, se rendre sur http://localhost:8000/api

## configuration du projet en local

S'assurer d'avoir la base de donnée qui est créee dans MYSQL
Et créer remplir le fichier `.env.local` pour y mettre votre configuration
exemples : `DATABASE_URL="mysql://root:@127.0.0.1:3306/gustocoffee-database?serverVersion=5.7&charset=utf8mb4"`
