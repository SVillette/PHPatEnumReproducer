# PHP Architecture Test - Final enum reproducer

This package is a reproducer of a bug in `phpat/phpat`.
When testing classes in a specific namespace are not final, PHPat throws an error if an enum is in that namespace.

## Installation
After cloning this repository, install the Composer dependencies.

```shell
composer install
```

## Usage
```shell
./vendor/bin/phpstan
```

![](public/enum-should-not-be-final.png "PHP enum are considered final")
