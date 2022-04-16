# OS Resources

## Description
Get OS resources from Laravel

## Usage
``` php
$ram = SystemResources::ram();
$ramUsed = SystemResources::ramUsed();
$ramTotal = SystemResources::ramTotal();

$disk = SystemResources::disk();
$diskUsed = SystemResources::diskUsed();
$diskTotal = SystemResources::diskTotal();

$cpuName = SystemResources::cpuName();
$cpu = SystemResources::cpu();
```

## Install

Via Composer

``` bash
$ composer require stepanenko3/laravel-system-resources
```

## Minimum requirements

- Laravel 9.0
- PHP 8.0

## Credits

- [Artem Stepanenko](http://github.io.com/stepanenko3)

## License

This package is licensed under the MIT License - see the `LICENSE` file for details

## Contributing

Pull requests and issues are welcome.
