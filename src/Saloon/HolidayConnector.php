<?php

namespace CCK\LaravelMalaysiaHolidays\Saloon;

use Saloon\Http\Connector;

class HolidayConnector extends Connector
{
    public function __construct()
    {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://www.officeholidays.com/countries/';
    }
}
