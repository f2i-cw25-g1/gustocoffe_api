# gustocoffe_api

## configuration du projet en local dans un environnnement de developpement

S'assurer d'avoir la database qui est créee dans MYSQL
Et créer un fichier `.env.local` pour y mettre la ligne suivante (sur WAMP sur Windows)
`DATABASE_URL="mysql://root:@127.0.0.1:3306/gustocoffee-database?serverVersion=5.7&charset=utf8mb4"`

### Commande SYMFONY pour le projet

### `php bin/console doctrine:database:drop --force`

Suppression de la database au besoin si déja créee

### `php bin/console doctrine:database:create`

Creation de la database "gustocoffe-database"

### `php bin/console make:migration`

/!\ Execution des migrations à partir des entités , supprimer le contenu du fichier en cas d'erreur

### `symfony console doctrine:migrations:migrate `

Executions des migrations

### `php bin/console hautelook:fixtures:load `

Lancement des fixtures pour charger des jeux de donnée fictif dans la BDD

### `php -S localhost:8000 -t public`

Aller dans le dossier du projet et lancer cette commande pour démarrer symfony

Si il y a une erreur vider le cache :

### `php bin/console cache:clear`
