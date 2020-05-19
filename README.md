# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/omidmorovati/paginator.svg?style=flat-square)](https://packagist.org/packages/omidmorovati/paginator)
[![Build Status](https://img.shields.io/travis/omidmorovati/paginator/master.svg?style=flat-square)](https://travis-ci.org/omidmorovati/paginator)
[![Quality Score](https://img.shields.io/scrutinizer/g/omidmorovati/paginator.svg?style=flat-square)](https://scrutinizer-ci.com/g/omidmorovati/paginator)
[![Total Downloads](https://img.shields.io/packagist/dt/omidmorovati/paginator.svg?style=flat-square)](https://packagist.org/packages/omidmorovati/paginator)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require omidmorovati/paginator
```

## Usage

``` php
To Publish All Congfig Run This:
php artisan omidmorovati-paginator:install



To Paginate Model:
$users=\App\User::makePaginate($perPage);

To Render Model Collection:
$users->renderPaginate();

you can change default_uri in config\paginator.php
OR 
use as renderPaginate parameter:
$users->renderPaginate('/page/');
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email morovati.om@gmail.com instead of using the issue tracker.

## Credits

- [omid morovati](https://github.com/omidmorovati)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
