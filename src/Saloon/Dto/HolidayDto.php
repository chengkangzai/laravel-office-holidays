<?php

namespace CCK\LaravelOfficeHolidays\Saloon\Dto;

use CCK\LaravelOfficeHolidays\Enums\HolidayType;
use Illuminate\Support\Carbon;

class HolidayDto
{
    public function __construct(
        public string $day,
        public Carbon $date,
        public string $holidayName,
        public HolidayType $type,
        public string $comments,
    ) {
    }
}
