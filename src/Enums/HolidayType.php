<?php

namespace CCK\LaravelMalaysiaHolidays\Enums;

enum HolidayType: string
{
    case NATIONAL_HOLIDAY = 'National Holiday';
    case REGIONAL_HOLIDAY = 'Regional Holiday';
    case NOT_PUBLIC_HOLIDAY = 'Not A Public Holiday';
    case GOVERNMENT_HOLIDAY = 'Government Holiday';
}
