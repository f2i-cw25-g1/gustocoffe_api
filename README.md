# gustocoffe_api 

## configuration du projet en local

S'assurer d'avoir la database qui est créee dans MYSQL
Et créer un fichier `.env.local` pour y mettre la ligne suivante (sur WAMP sur Windows)
`DATABASE_URL="mysql://root:@127.0.0.1:3306/gusto-coffee-api?serverVersion=5.7&charset=utf8mb4"`

### Commande SYMFONY pour le projet

### `symfony console doctrine:database:drop --force`
Suppression de la database
### `symfony console doctrine:database:create`
Creation de la database
### `symfony console make:migration`
Supprimer les fichiers qui sont dans le dossier 'migrations' avant de faire les migrations
### `symfony console doctrine:migrations:migrate `
Executions des migrations
### `php bin/console hautelook:fixtures:load `
Lancement des fixtures 
