kucera/monolog-extensions-bundle
======
[![Build Status](https://travis-ci.org/pavelkucera/monolog-extensions-bundle.svg?branch=master)](https://travis-ci.org/pavelkucera/monolog-extensions-bundle)
[![Downloads this Month](https://img.shields.io/packagist/dm/kucera/monolog-extensions-bundle.svg)](https://packagist.org/packages/kucera/monolog-extensions-bundle)
[![Latest stable](https://img.shields.io/packagist/v/kucera/monolog-extensions-bundle.svg)](https://packagist.org/packages/kucera/monolog-extensions-bundle)


Bundle implementing some [Monolog extensions](https://github.com/pavelkucera/monolog-extensions) into Symfony.

Installation
------------

Using  [Composer](http://getcomposer.org/):

```sh
$ composer require kucera/monolog-extensions-bundle:~0.1.0
```

Then enable the bundle in your AppKernel:
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


Blue Screen Handler
------------
Converts your exception reports into beautiful and clear html files using [Tracy](https://github.com/nette/tracy).

[![Uncaught exception rendered by Tracy](http://nette.github.io/tracy/images/tracy-exception.png)](http://nette.github.io/tracy/tracy-exception.html)

### Tell me how!
```yml
monolog:
    handlers:
        blueScreen:
            type: blue screen
```
… Profit! Any exception making it to the top is automatically saved in `%kernel.logs_dir%/blueScreen`. You can easily change the log directory, see full configuration options below:
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
This works silently and also in production mode!
