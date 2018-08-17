# FcPhp Service

Abstract class to Service FcPhp

[![Build Status](https://travis-ci.org/00F100/fcphp-service.svg?branch=master)](https://travis-ci.org/00F100/fcphp-service) [![codecov](https://codecov.io/gh/00F100/fcphp-service/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-service)

[![PHP Version](https://img.shields.io/packagist/php-v/00f100/fcphp-service.svg)](https://packagist.org/packages/00F100/fcphp-service) [![Packagist Version](https://img.shields.io/packagist/v/00f100/fcphp-service.svg)](https://packagist.org/packages/00F100/fcphp-service) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-service/downloads)](https://packagist.org/packages/00F100/fcphp-service)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-service
```

or add in composer.json
```json
{
    "require": {
        "00f100/fcphp-service": "*"
    }
}
```

## How to use

Extends your service from [FcPhp Service](https://github.com/00F100/fcphp-service) and add your repositories into Service using contruct method. After call to repository using "getRepository()" method.

```php

namespace Example
{
    use FcPhp\Service\Service;

    class ExampleService extends Service
    {
        public function __construct($userRepository, $profileRepository, $addressRepository)
        {
            $this->setRepository('user', $userRepository);
            $this->setRepository('profile', $profileRepository);
            $this->setRepository('address', $addressRepository);
        }

        public function findUsers()
        {
            return $this->getRepository('user')->findAll();
        }

        public function findProfiles()
        {
            return $this->getRepository('profile')->findAll();
        }

        public function findAddresses()
        {
            return $this->getRepository('address')->findAll();
        }
    }
}

```

## Service Callback

```php

use Example\ExampleService;

$instance = new ExampleService();

// Callback on find service using "getService()"...
$instance->callback('callbackRepository', function(string $repository, $instance) {

    // Your code here...

});

```