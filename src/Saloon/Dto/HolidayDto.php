<?php

namespace CCK\LaravelMalaysiaHolidays\Saloon\Dto;

use CCK\LaravelMalaysiaHolidays\Enums\HolidayType;
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
