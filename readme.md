# kucera/monolog-extensions-bundle

[![Build Status](https://travis-ci.org/pavelkucera/monolog-extensions-bundle.svg?branch=master)](https://travis-ci.org/pavelkucera/monolog-extensions-bundle)
[![Downloads this Month](https://img.shields.io/packagist/dm/kucera/monolog-extensions-bundle.svg)](https://packagist.org/packages/kucera/monolog-extensions-bundle)
[![Latest stable](https://img.shields.io/packagist/v/kucera/monolog-extensions-bundle.svg)](https://packagist.org/packages/kucera/monolog-extensions-bundle)


Bundle providing mainly integration of [Tracy](https://github.com/nette/tracy) into [Symfony](https://symfony.com).

## Tracy capabilities

Long story short, Tracy helps you debug your applications when an error occurs providing you lots of information about what just happened. Check out
[live example](http://nette.github.io/tracy/tracy-exception.html) and [Tracy documentation](https://github.com/nette/tracy#visualization-of-errors-and-exceptions)
to see the full power of this tool.

To replace default Symfony Bluescreen you can use [Tracy Bluescreen Bundle](https://github.com/VasekPurchart/Tracy-Blue-Screen-Bundle)
fully compatible with this library.

## Installation

Using  [Composer](http://getcomposer.org/):

```sh
$ composer require kucera/monolog-extensions-bundle:~0.1.0
```

### Register Bundle
```php
// AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Kucera\MonologExtensionsBundle\KuceraMonologExtensionsBundle(), // what a terrible name!
    );
}
```

### Register a new Monolog handler
```yml
monolog:
    handlers:
        blueScreen:
            type: blue screen
```

## Profit!
Any error/exception making it to the top is automatically saved in `%kernel.logs_dir%/blueScreen`. You can easily change the log directory,
see full configuration options below:

```yml
# config.yml
monolog:
    handlers:
        blueScreen:
            type: blue screen
            path: %kernel.logs_dir%/blueScreen # must exist
            level: debug
            bubble: true
```
This works out of the box and also in production mode!
