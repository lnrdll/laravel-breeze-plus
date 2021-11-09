<div align="center">
    <h1>
        <a href="#">Laravel Breeze-plus</a>
    </h1>
    <h4>
        <a href="#introduction">Introduction</a>
        •
        <a href="#requirements">Requirements</a>
        •
        <a href="#installation">Installation</a>
        •
        <a href="#changelog">Changelog</a>
        •
        <a href="#contributing">Contributing</a>
        •
        <a href="#license">License</a>
    </h4>
    <p>
        <a href="https://packagist.org/packages/rlunardelli/laravel-breeze-plus">
            <img src="https://img.shields.io/packagist/dt/rlunardelli/laravel-breeze-plus.svg" alt="Total Downloads">
        </a>
        <a href="https://packagist.org/packages/rlunardelli/laravel-breeze-plus">
            <img src="https://img.shields.io/packagist/v/rlunardelli/laravel-breeze-plus.svg" alt="Latest Stable Version">
        </a>
        <a href="https://packagist.org/packages/rlunardelli/laravel-breeze-plus">
            <img src="https://img.shields.io/packagist/l/rlunardelli/laravel-breeze-plus.svg" alt="License">
        </a>
    </p>
    <!-- ![GitHub Actions](https://github.com/rlunardelli/laravel-breeze-plus/actions/workflows/main.yml/badge.svg) -->
</div>

## Introduction

Breeze-plus provides a minimal and simple user profile page where users can update their name, email, password, and delete their account. All controllers, views, routes, requests, and rules are published to your application just like Breeze.

## Requirements

It requires fresh install of [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze-installation).

## Installation

You can install the package via composer:

```bash
composer require rlunardelli/laravel-breeze-plus --dev
```

After Composer has installed the Laravel Breeze-plus package, you may run the `breeze-plus:install` Artisan commmand to publish the controllers, views, routes, requests, and rules to your application.

```bash
php artisan breeze-plus:install
```

Once the assets have been published, a new dropdown menu item `Profile` will show up.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
