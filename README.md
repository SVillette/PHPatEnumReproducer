# PHP Architecture Test - Final enum reproducer

This package is a reproducer of a bug in `phpat/phpat`.
When testing classes in a specific namespace are not final, PHPat throws an error if an enum is in that namespace.

[Github Issue](https://github.com/carlosas/phpat/issues/220)

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

## Workaround
It seems that enums are considered final by PHP (see `ReflectionEnum` API), so it's not a bug of PHPat.

```php
$reflectionEnum = new \ReflectionEnum(FooEnum::class);
var_dump($reflectionEnum->isFinal()); //true
```

The solution is to have the following test:

```php
final class EntityNotFinalTest
{
    public function testEntityClassesAreNotFinal(): Rule
    {
        return PHPat::rule()
            ->classes(Selector::namespace('App\Entity'))
            ->excluding(Selector::enum())
            ->shouldNotBeFinal()
        ;
    }
}

```
