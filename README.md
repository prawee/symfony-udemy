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

## Install package with form

```bash
composer require symfony/form
php bin/console make:form
```

## Install package and validation

```bash
composer require symfony/validator
```

## Fixed relation of database

```bash
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Install package and asset

```bash
composer require symfony/asset
composer require encore
npm run watch
```

### Enable SASS

```bash
npm install sass-loader@^7.0.1 node-sass --save-dev
npm run watch
```

## Fixture

```bash
composer require orm-fixtures --dev
```

## Start Server

```bash
symfony server:start
```