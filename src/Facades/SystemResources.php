<?php
namespace Stepanenko3\LaravelSystemResources\Facades;

use Illuminate\Support\Facades\Facade;

class SystemResources extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return \Stepanenko3\LaravelSystemResources\SystemResources::class;
    }
}
