<?php

namespace CCK\LaravelOfficeHolidays;

use CCK\LaravelOfficeHolidays\Saloon\HolidayConnector;
use CCK\LaravelOfficeHolidays\Saloon\Request\GetAllHoliday;
use CCK\LaravelOfficeHolidays\Saloon\Request\GetAllHolidayByState;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class LaravelOfficeHolidays
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
