# A Laravel Package that list out office's Holiday that Scraped from https://www.officeholidays.com/countries

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chengkangzai/laravel-office-holidays.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-office-holidays)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-office-holidays/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chengkangzai/laravel-office-holidays/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-office-holidays/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chengkangzai/laravel-office-holidays/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chengkangzai/laravel-office-holidays.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-office-holidays)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
