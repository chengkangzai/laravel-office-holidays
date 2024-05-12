<?php

namespace CCK\LaravelOfficeHolidays\Saloon\Request;

use CCK\LaravelOfficeHolidays\Saloon\Dto\HolidayDto;
use CCK\LaravelOfficeHolidays\Services\HtmlParserService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAllHolidayByState extends Request implements Cacheable
{
    use HasCaching;

    protected Method $method = Method::GET;

    public function __construct(
        public int       $year,
        protected string $country,
        protected string $state,
    )
    {
    }

    public function resolveEndpoint(): string
    {
        return $this->country . '/' . $this->state . '/' . $this->year;
    }

    /**
     * @return Collection<HolidayDto>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return HtmlParserService::getHolidays($response->body(), $this->year);
    }
    public function resolveCacheDriver(): LaravelCacheDriver
    {
        return new LaravelCacheDriver(Cache::driver(config('office-holidays.cache.driver')));
    }

    public function cacheExpiryInSeconds(): int
    {
        return config('office-holidays.cache.duration');
    }
}
