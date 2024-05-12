<?php

namespace CCK\LaravelMalaysiaHolidays\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CCK\LaravelMalaysiaHolidays\LaravelMalaysiaHolidays
 */
class LaravelMalaysiaHolidays extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CCK\LaravelMalaysiaHolidays\LaravelMalaysiaHolidays::class;
    }
}
