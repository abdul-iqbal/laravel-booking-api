# Laravel Booking API

A client-safe Laravel 13 scheduling and booking API sample. It covers validation of booking lifecycle data, date-based filtering, Eloquent persistence, and pagination.

## Technical highlights

- Laravel 13 API resource patterns
- Booking validation, including a valid start/end time relationship
- Eloquent model casting for schedule data
- Filterable, paginated list endpoint for calendars and dashboards
- Migration-first database design

## Quick start

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

Use `GET /api/bookings?date=2026-08-01` for a date-filtered calendar feed.

## Scope note

This is original, client-safe showcase code. It does not include client data, credentials, or proprietary booking logic.
