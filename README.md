# OS Resources

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stepanenko3/laravel-system-resources.svg?style=flat-square)](https://packagist.org/packages/stepanenko3/laravel-system-resources)
[![Total Downloads](https://img.shields.io/packagist/dt/stepanenko3/laravel-system-resources.svg?style=flat-square)](https://packagist.org/packages/stepanenko3/laravel-system-resources)
[![License](https://poser.pugx.org/stepanenko3/laravel-system-resources/license)](https://packagist.org/packages/stepanenko3/laravel-system-resources)

## Description

Get OS resources from Laravel

## Requirements

- `php: >=8.0`
- `laravel/framework: ^9.0`

## Installation

```bash
# Install the package
composer require stepanenko3/laravel-system-resources
```

## Usage

``` php
use Stepanenko3\LaravelSystemResources\Facades\SystemResources;

$ram = SystemResources::ram();
$ramUsed = SystemResources::ramUsed();
$ramTotal = SystemResources::ramTotal();

$disk = SystemResources::disk();
$diskUsed = SystemResources::diskUsed();
$diskTotal = SystemResources::diskTotal();

$cpuName = SystemResources::cpuName();
$cpu = SystemResources::cpu();
```

## Credits

- [Artem Stepanenko](https://github.com/stepanenko3)

## Contributing

Thank you for considering contributing to this package! Please create a pull request with your contributions with detailed explanation of the changes you are proposing.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
