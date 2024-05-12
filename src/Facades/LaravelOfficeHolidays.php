<?php

namespace CCK\LaravelOfficeHolidays\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CCK\LaravelOfficeHolidays\LaravelOfficeHolidays
 */
class LaravelOfficeHolidays extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CCK\LaravelOfficeHolidays\LaravelOfficeHolidays::class;
    }
}
