# Suitable Paginator to Laravel Paginator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/omidmorovati/paginator.svg?style=flat-square)](https://packagist.org/packages/omidmorovati/paginator)
[![Build Status](https://img.shields.io/travis/omidmorovati/paginator/master.svg?style=flat-square)](https://travis-ci.org/omidmorovati/paginator)
[![Quality Score](https://img.shields.io/scrutinizer/g/omidmorovati/paginator.svg?style=flat-square)](https://scrutinizer-ci.com/g/omidmorovati/paginator)
[![Total Downloads](https://img.shields.io/packagist/dt/omidmorovati/paginator.svg?style=flat-square)](https://packagist.org/packages/omidmorovati/paginator)

When using default laravel paginator (simplePaginate or paginate methods) you cant easily 
assign custom url . so by using this package you can assign your custom url
in configuration file as well as parameter.
   
## Installation

**You can install the package via composer:**

```bash
composer require omidmorovati/paginator
```
**To Publish All Config Run This:**
```bash
php artisan omidmorovati-paginator:install
```

## Usage

**To Paginate Model:**
``` php
$users=\App\User::makePaginate($perPage);
```
**To Render Model Collection:**
``` php
$users->renderPaginate();
```
_you can change default_uri in config\paginator.php
OR 
use as renderPaginate parameter:_
``` php
$users->renderPaginate('/page/');
```

**To include Css style:**
``` php
<link href="{{asset('vendor/omidmorovati/paginator/css/style.css')}}" rel="stylesheet">
```

**so You can change style.css in public folder**


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
