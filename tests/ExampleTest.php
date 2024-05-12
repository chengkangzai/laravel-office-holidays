<?php

use Carbon\Carbon;
use CCK\LaravelOfficeHolidays\Enums\HolidayType;
use CCK\LaravelOfficeHolidays\Enums\MalaysiaStates;
use CCK\LaravelOfficeHolidays\LaravelOfficeHolidays;
use CCK\LaravelOfficeHolidays\Saloon\Request\GetAllHoliday;
use CCK\LaravelOfficeHolidays\Saloon\Request\GetAllHolidayByState;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('can get malaysia holiday', function () {
    new MockClient([
        GetAllHoliday::class => MockResponse::make(file_get_contents(__DIR__.'/mocks/malaysia-holiday.html')),
    ]);

    $s = app(LaravelOfficeHolidays::class)->getAllHolidays('malaysia', 2024);

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

    $s = app(LaravelOfficeHolidays::class)->getHolidaysByState('malaysia', 2024, MalaysiaStates::Johor->value);

    expect($s)->toBeInstanceOf(Collection::class)
        ->toHaveCount(20)
        ->and($s[0]->day)->toBe('Thursday')
        ->and($s[0]->date)->toBeInstanceOf(Carbon::class)
        ->and($s[0]->date->format('Y-m-d'))->toBe('2024-01-25')
        ->and($s[0]->holidayName)->toBe('Thaipusam')
        ->and($s[0]->type)->toBe(HolidayType::REGIONAL_HOLIDAY)
        ->and($s[0]->comments)->toBe('Several states');
});
