<?php

declare(strict_types=1);

namespace Tests\Architecture;

use PHPat\Selector\Selector;
use PHPat\Test\Builder\Rule;
use PHPat\Test\PHPat;

final class EntityNotFinalTest
{
    public function testEntityClassesAreNotFinal(): Rule
    {
        return PHPat::rule()
            ->classes(Selector::namespace('App\Entity'))
            ->shouldNotBeFinal()
        ;
    }
}
