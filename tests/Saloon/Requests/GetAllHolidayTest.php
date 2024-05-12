<?php

use CCK\LaravelOfficeHolidays\Enums\HolidayType;
use CCK\LaravelOfficeHolidays\Saloon\HolidayConnector;
use CCK\LaravelOfficeHolidays\Saloon\Request\GetAllHoliday;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('can get malaysia holiday - saloon', function () {
    new MockClient([
        GetAllHoliday::class => MockResponse::make(file_get_contents(__DIR__.'/../../mocks/malaysia-holiday.html')),
    ]);
    $connector = new HolidayConnector();
    $request = new GetAllHoliday(2024, 'malaysia');

    $s = $connector->send($request)->dto();

    expect($s)->toBeInstanceOf(Collection::class)
        ->toHaveCount(54)
        ->and($s[0]->day)->toBe('Monday')
        ->and($s[0]->date)->toBeInstanceOf(Carbon::class)
        ->and($s[0]->date->format('Y-m-d'))->toBe('2024-01-01')
        ->and($s[0]->holidayName)->toBe('New Year\'s Day')
        ->and($s[0]->type)->toBe(HolidayType::REGIONAL_HOLIDAY)
        ->and($s[0]->comments)->toBe('Most states');
});
