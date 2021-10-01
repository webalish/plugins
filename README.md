# Alish-Modules

[![Latest Version on Packagist](https://img.shields.io/badge/Version-1.0-green)](https://packagist.org/packages/alishplugins/alish-module)
[![Software License](https://img.shields.io/github/license/webalish/plugins)](LICENSE.md)

| **Alish**  |  **Alish-modules** |
|---|---|
| 1.0  | ^1.0 |

`alishplugins/alish-module` is a Laravel package which created to manage your large Laravel app using modules. Module is like a Laravel package, it has some views, controllers or models. This package is supported and tested in Laravel 8.


Find out why you should use this package in the article: [Writing modular applications with laravel-modules]().

## Install

To install through Composer, by run the following command:

``` bash
composer require alishplugins/alish-module
```

The package will automatically register a service provider and alias.

Optionally, publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="Alishplugins\Modules\LaravelModulesServiceProvider"
```

### Autoloading

By default, the module classes are not loaded automatically. You can autoload your modules using `psr-4`. For example:

``` json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "Modules/"
    }
  }
}
```

**Tip: don't forget to run `composer dump-autoload` afterwards.**

## Documentation

You'll find installation instructions and full documentation on [https://alish.io/alish-modules/]().

## Credits

- [alish team](https://github.com/webalish)

## About team us


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
