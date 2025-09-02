<?php

use CCK\LaravelOfficeHolidays\Enums\HolidayType;
use CCK\LaravelOfficeHolidays\Enums\MalaysiaStates;
use CCK\LaravelOfficeHolidays\Saloon\HolidayConnector;
use CCK\LaravelOfficeHolidays\Saloon\Request\GetAllHolidayByState;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('can get malaysia - johor holiday - saloon', function () {
    new MockClient([
        GetAllHolidayByState::class => MockResponse::make(file_get_contents(__DIR__.'/../../mocks/malaysia-johor-holiday.html')),
    ]);
    $connector = new HolidayConnector;
    $request = new GetAllHolidayByState(2024, 'malaysia', MalaysiaStates::Johor->value);

    $s = $connector->send($request)->dto();

    expect($s)->toBeInstanceOf(Collection::class)
        ->toHaveCount(21)
        ->and($s[0]->day)->toBe('Thursday')
        ->and($s[0]->date)->toBeInstanceOf(Carbon::class)
        ->and($s[0]->date->format('Y-m-d'))->toBe('2024-01-25')
        ->and($s[0]->holidayName)->toBe('Thaipusam')
        ->and($s[0]->type)->toBe(HolidayType::REGIONAL_HOLIDAY)
        ->and($s[0]->comments)->toBe('Several states');
});
