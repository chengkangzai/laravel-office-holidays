# A Laravel Package that list out office's Holiday that Scraped from https://www.officeholidays.com/countries

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chengkangzai/laravel-office-holidays.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-office-holidays)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-office-holidays/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chengkangzai/laravel-office-holidays/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-office-holidays/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chengkangzai/laravel-office-holidays/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chengkangzai/laravel-office-holidays.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-office-holidays)

This package is a Laravel Package that list out office's Holiday that Scraped from https://www.officeholidays.com/.
The underlying package that is used to scrape the data is using [Saloon](https://docs.saloon.dev/).


## Installation

You can install the package via composer:

```bash
composer require chengkangzai/laravel-office-holidays
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-office-holidays-config"
```

This is the contents of the published config file:

```php
return [
    'cache' => [
        'driver' => 'file',
        'duration' => 60 * 60 * 24 * 7 // 1 week
    ]
];
```

## Usage

### Get All Holidays for a specific country and year

```php
$laravelOfficeHolidays = new CCK\LaravelOfficeHolidays();
app(LaravelOfficeHolidays::class)->getAllHolidays('malaysia', 2024)
```

### Get All Holidays for a specific country and year
```php
$laravelOfficeHolidays = new CCK\LaravelOfficeHolidays();
app(LaravelOfficeHolidays::class)->getHolidaysByState('malaysia', 2024, 'johor')
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ching Cheng Kang](https://github.com/chengkangzai)
- [All Contributors](../../contributors)

## Alternatives
[MalaysiaHoliday](https://github.com/afiqiqmal/MalaysiaHoliday) -> This project was inspired by [Hafiq](https://github.com/afiqiqmal), his package [MalaysiaHoliday](https://github.com/afiqiqmal/MalaysiaHoliday) is a great alternative for Malaysian Holidays, this package does not limit the usage for laravel.
[Spatie Holidays](https://github.com/spatie/holidays) -> This package is a great alternative for holidays from spatie, it is more robust and does not rely on scraping data from the internet.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
