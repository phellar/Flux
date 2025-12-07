<?php

namespace Phellar\Scaffold\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Phellar\Scaffold\Scaffold
 */
class Scaffold extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Phellar\Scaffold\Scaffold::class;
    }
}
