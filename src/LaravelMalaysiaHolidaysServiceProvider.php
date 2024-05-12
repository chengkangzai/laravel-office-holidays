<?php

namespace CCK\LaravelMalaysiaHolidays;

use CCK\LaravelMalaysiaHolidays\Commands\LaravelMalaysiaHolidaysCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMalaysiaHolidaysServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-malaysia-holidays')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-malaysia-holidays_table')
            ->hasCommand(LaravelMalaysiaHolidaysCommand::class);
    }
}
