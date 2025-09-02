# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Testing
```bash
# Run all tests
composer test
# or
vendor/bin/pest

# Run tests with coverage
composer test-coverage
# or
vendor/bin/pest --coverage

# Run specific test
vendor/bin/pest tests/Saloon/Requests/GetAllHolidayTest.php
```

### Code Quality
```bash
# Run static analysis
composer analyse
# or
vendor/bin/phpstan analyse

# Format code according to Laravel standards
composer format
# or
vendor/bin/pint
```

## Architecture Overview

This Laravel package scrapes holiday data from https://www.officeholidays.com using the Saloon HTTP client. It provides a clean API for retrieving national and regional holidays for any country and year.

### Core Components

**Main Service Class**: `CCK\LaravelOfficeHolidays\LaravelOfficeHolidays`
- Two primary methods: `getAllHolidays()` and `getHolidaysByState()`
- Returns collections of `HolidayDto` objects

**Saloon Integration**: 
- `HolidayConnector`: Base connector for officeholidays.com API
- `GetAllHoliday` and `GetAllHolidayByState`: Request classes for different endpoints
- Uses Saloon's caching plugin for performance

**Data Processing**:
- `HtmlParserService`: Parses HTML responses from officeholidays.com into structured data
- Uses DOMDocument to extract holiday information from HTML tables
- Handles data transformation into `HolidayDto` objects

**Data Transfer Objects**:
- `HolidayDto`: Represents a single holiday with day, date, name, type, and comments
- `HolidayType` enum: Categorizes holidays (National, Regional, Government, Not Public)

### Package Structure
```
src/
├── Enums/
│   ├── HolidayType.php          # Holiday categorization
│   └── MalaysiaStates.php       # State enumeration for Malaysia
├── Facades/
│   └── LaravelOfficeHolidays.php
├── Saloon/
│   ├── Dto/HolidayDto.php       # Data transfer object
│   ├── HolidayConnector.php     # Base Saloon connector
│   └── Request/                 # HTTP request classes
├── Services/
│   └── HtmlParserService.php    # HTML parsing logic
├── LaravelOfficeHolidays.php    # Main service class
└── LaravelOfficeHolidaysServiceProvider.php
```

### Configuration
- Config file: `config/office-holidays.php`
- Configures cache driver and duration (default: file driver, 1 week)
- Publish with: `php artisan vendor:publish --tag="laravel-office-holidays-config"`

### Key Dependencies
- `saloonphp/saloon`: HTTP client for API requests
- `saloonphp/cache-plugin`: Caching functionality
- `spatie/laravel-package-tools`: Laravel package boilerplate
- Uses `ext-dom` for HTML parsing

### Testing Strategy
- Uses Pest PHP for testing
- Orchestra Testbench for Laravel package testing environment
- Architecture tests with `pestphp/pest-plugin-arch`
- Larastan for static analysis with Laravel-specific rules

### Data Flow
1. User calls `getAllHolidays()` or `getHolidaysByState()`
2. Method creates appropriate Saloon request object
3. HolidayConnector sends HTTP request to officeholidays.com
4. Response HTML is parsed by HtmlParserService
5. HTML table data is transformed into HolidayDto collection
6. Results are cached and returned to user

### Development Notes
- Web scraping approach means data structure depends on external website
- HTML parsing is fragile and may break if officeholidays.com changes structure
- Caching is essential to avoid excessive requests to external service
- Package supports any country available on officeholidays.com