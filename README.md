# Zend Framework 2 to Doctrine PHPCR ODM integration
## Overview

This Module provides functionality to connect [Zend Framework 2](https://github.com/zendframework/zf2) and
[Doctrine PHPCR-ODM](https://github.com/doctrine/phpcr-odm).
It provides configuration and dependencies for both Jackrabbit and DBAL JCR backends, and allows usage with Midgard2 too.

## Requirements
-------------

The module runs on any typical [Zend Framework 2 Skeleton application](https://github.com/zendframework/ZendSkeletonApplication)
setup.

## Setup

Following steps are necessary to get this project working (considering a zf2-skeleton or very similar application)

  1. add `"ocramius/zf-phpcr-odm": "dev-master"` to your `composer.json` (`"minimum-stability": "dev"` is also required)
  2. Add `DoctrineModule` and `ZfPhpcrOdm` to the enabled modules list
  3. create directory `my/project/directory/data/ZfPhpcrOdm/Proxy` and make sure your application has write
          access to it. This directory can be changed using the module options.

## Usage

This module allows you to simply ask the default application's `ServiceLocator` for an instance of `Doctrine\ODM\PHPCR\DocumentManager`:

```php
<?php
$documentManager = $serviceLocator->get('Doctrine\ODM\PHPCR\DocumentManager');
```

## Examples

Please refer to https://github.com/Ocramius/ZfPhpcrOdmSample to see a working example of this module being used.