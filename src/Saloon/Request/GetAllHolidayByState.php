<?php

namespace CCK\LaravelMalaysiaHolidays\Saloon\Request;

use CCK\LaravelMalaysiaHolidays\Saloon\Dto\HolidayDto;
use CCK\LaravelMalaysiaHolidays\Services\HtmlParserService;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAllHolidayByState extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $year,
        protected string $country,
        protected string $state,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return $this->country.'/'.$this->state.'/'.$this->year;
    }

    /**
     * @return Collection<HolidayDto>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return HtmlParserService::getHolidays($response->body(), $this->year);
    }
}
