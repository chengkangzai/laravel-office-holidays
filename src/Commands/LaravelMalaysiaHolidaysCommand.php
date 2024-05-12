<?php

namespace CCK\LaravelMalaysiaHolidays\Commands;

use Illuminate\Console\Command;

class LaravelMalaysiaHolidaysCommand extends Command
{
    public $signature = 'laravel-malaysia-holidays';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
