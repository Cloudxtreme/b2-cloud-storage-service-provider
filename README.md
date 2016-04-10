# Laravel/Lumen Service Provider for Backblaze B2 Cloud Storage
[![Author](http://img.shields.io/badge/author-@megandavidson-blue.svg?style=flat-square)](https://twitter.com/abisinthe#41) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

A [Laravel](http://laravel.com) and [Lumen](http://lumen.laravel.com) service provider for connecting to the Backblaze B2 Cloud Storage api.

## Installation

```bash
composer require insanekitty/b2-cloud-storage-service-provider
```

## Instalation
You can install this package with [composer](http://getcomposer.org) by typing in your console: `composer require 'insanekitty/b2-cloud-storage-service-provider'` or adding this at your project's `composer.json`.

## Configuration
### Laravel 5.2
Register the `BackblazeB2ServiceProvider` in your `providers` array in `config/app.php` in [Laravel 5.2](http://laravel.com)

```php
'providers' => [
  // ...

  Insanekitty\BackblazeB2\Providers\BackblazeB2ServiceProvider::class,
],
```

### Lumen 5.1
Register the `BackblazeB2LumenServiceProvider` in your `bootstrap/app.php` in [Lumen 5.1](http://lumen.laravel.com)

```php
$app->register(Insanekitty\BackblazeB2\Providers\BackblazeB2LumenServiceProvider::class);
```

### Environment Configuration
Laravel and Lumen use `.env` files for their configuration. You will need to set your Account ID and Application Key; these can be created from your account section  on the [Backblaze B2 Cloud Storage website](https://www.backblaze.com/b2/cloud-storage.html). To change defaults configuration add this environment variables in your `.env` file:

- B2_ACCOUNT_ID (Your unique Account ID. Defaults null).
- B2_APPLICATION_KEY (Your unique application key. Defaults null).

## Usage
~~~ php
use Illuminate\Support\Facades\Storage;

$b2 = Storage::disk('b2');
Storage::disk('b2')->put('hello-world.txt', 'Hello World!');

~~~
