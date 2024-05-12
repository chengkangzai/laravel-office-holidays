<?php

namespace CCK\LaravelMalaysiaHolidays;

use CCK\LaravelMalaysiaHolidays\Saloon\HolidayConnector;
use CCK\LaravelMalaysiaHolidays\Saloon\Request\GetAllHoliday;
use CCK\LaravelMalaysiaHolidays\Saloon\Request\GetAllHolidayByState;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class LaravelMalaysiaHolidays
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAllHolidays(string $country, int $year)
    {
        $connector = new HolidayConnector();
        $request = new GetAllHoliday($year, $country);

        return $connector->send($request)->dto();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getHolidaysByState(string $country, int $year, string $state)
    {
        $connector = new HolidayConnector();
        $request = new GetAllHolidayByState($year, $country, $state);

        return $connector->send($request)->dto();
    }

}
