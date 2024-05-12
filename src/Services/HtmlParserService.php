<?php

namespace CCK\LaravelOfficeHolidays\Services;

use CCK\LaravelOfficeHolidays\Enums\HolidayType;
use CCK\LaravelOfficeHolidays\Saloon\Dto\HolidayDto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class HtmlParserService
{
    /**
     * @return Collection<HolidayDto>
     */
    public static function getHolidays(string $responseData, int $year): Collection
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($responseData);
        $tr = $dom->getElementsByTagName('tr');

        $holidays = collect();
        foreach ($tr as $key => $value) {
            $td = $value->getElementsByTagName('td');

            //skip the first row->header
            if ($key === 0) {
                continue;
            }

            //skip last row->footer
            if ($key === $tr->length - 1) {
                continue;
            }

            //index 0 -> Day, index 1 -> Date, index 2 -> Holiday Name, index 3 -> Type, index 4 -> Comments
            $date = Carbon::parse($td[1]?->textContent ?? '')->setYear($year);
            $type = HolidayType::tryFrom($td[3]?->textContent);
            $holiday = new HolidayDto(
                day: $td[0]?->textContent ?? '',
                date: $date,
                holidayName: $td[2]?->textContent ?? '',
                type: $type,
                comments: $td[4]?->textContent ?? '',
            );

            $holidays->push($holiday);
        }

        return $holidays;
    }
}
