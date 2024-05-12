<?php

use Carbon\Carbon;
use CCK\LaravelMalaysiaHolidays\Enums\HolidayType;
use CCK\LaravelMalaysiaHolidays\Enums\MalaysiaStates;
use CCK\LaravelMalaysiaHolidays\Saloon\HolidayConnector;
use CCK\LaravelMalaysiaHolidays\Saloon\Request\GetAllHoliday;
use CCK\LaravelMalaysiaHolidays\Saloon\Request\GetAllHolidayByState;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('can get malaysia holiday', function () {
    new MockClient([
        GetAllHoliday::class => MockResponse::make(file_get_contents(__DIR__.'/mocks/malaysia-holiday.html')),
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

it('can get malaysia - johor holiday', function () {
    new MockClient([
        GetAllHolidayByState::class => MockResponse::make(file_get_contents(__DIR__.'/mocks/malaysia-johor-holiday.html')),
    ]);
    $connector = new HolidayConnector();
    $request = new GetAllHolidayByState(2024, 'malaysia', MalaysiaStates::Johor->value);

    $s = $connector->send($request)->dto();

    expect($s)->toBeInstanceOf(Collection::class)
        ->toHaveCount(20)
        ->and($s[0]->day)->toBe('Thursday')
        ->and($s[0]->date)->toBeInstanceOf(Carbon::class)
        ->and($s[0]->date->format('Y-m-d'))->toBe('2024-01-25')
        ->and($s[0]->holidayName)->toBe('Thaipusam')
        ->and($s[0]->type)->toBe(HolidayType::REGIONAL_HOLIDAY)
        ->and($s[0]->comments)->toBe('Several states');
});
