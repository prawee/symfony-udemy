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

## Start Server

```bash
symfony server:start
```