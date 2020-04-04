# symfony-udemy

## Create project

```bash
symfony new symfony-udemy --version=4.4
```

## Install package and create controller

```bash
composer require symfony/maker-bundle
composer require annotations | composer require doctrine/annotations
php bin/console make:controller
```

## Install package and render view

```bash
composer require symfony/twig-bundle
```

## Install package and database

```bash
composer require symfony/orm-pack
php bin/console doctrine:database:create
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:migrations:execute --up 20200404071331
```

## Start Server

```bash
symfony server:start
```