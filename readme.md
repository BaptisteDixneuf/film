## Projet Film Mr Legrand

```ssh
git clone  https://github.com/BaptisteDixneuf/film.git
cd film/
composer install
cd ..
chmod -R 777 film/
cd film/app/config -> edit config in database.php
cd ..
cd ..
php artisan migrate

**************************************
*     Application In Production!     *
**************************************

Do you really wish to run this command? y
Migration table created successfully.
Migrated: 2014_11_07_220747_CreateActeursTable
Migrated: 2014_11_10_155530_CreateRealisateursTable
Migrated: 2014_11_10_170209_CreateDistributeursTable
Migrated: 2014_11_10_191758_CreateFilmsTable
Migrated: 2014_11_11_141950_create_acteur_film_table
Migrated: 2014_11_20_212400_createAfficheTable
Migrated: 2014_11_25_205901_createGenresTable
Migrated: 2014_12_11_224225_create_foreign_keys


```


