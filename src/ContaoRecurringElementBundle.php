<?php
namespace Lukasbableck\ContaoRecurringElementBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoRecurringElementBundle extends Bundle{

    public function getPath(): string{
        return \dirname(__DIR__);
    }

}
