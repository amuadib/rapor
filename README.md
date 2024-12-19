# Aplikasi Pengelolaan Rapor

## Fitur

-   Santri
-   Ustadz
-   Pelajaran
-   Semester
-   Rombel

## Persyaratan

-   PHP 8.2
-   Git
-   Composer

## Instalasi

```bash
git clone https://github.com/amuadib/rapor.git
cd yayasan
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan make:filament-user
php artisan serve
```

## Lisensi

MIT
