README
======

This Module provides functionality to connect Zend Framework 2 ( http://packages.zendframework.com/ ) and Doctrine PHPCR-ODM ( https://github.com/doctrine/phpcr-odm ).
The module provides configuration and dependencies for both Jackrabbit and DBAL JCR backends.

Dependencies
-------------
This module uses Zend Framework 2 and Doctrine PHPCR-ODM.
Doctrine PHPCR-ODM is required and provided as a git submodule, while a Zend Application skeleton () or similar structure should already be available.

Setup
-------------

Following steps are necessary to get this project working (considering a zf2-skeleton or very similar application)

  1. cd path/to/my/zf2application
  2. git clone https://Ocramius@github.com/Ocramius/ZfPhpcrOdm.git modules/ZfPhpcrOdm --recursive
  4. open path/to/my/zf2application/config/application.config.php and add 'ZfPhpcrOdm' to your 'modules' configuration key.

Configuration
-------------

 * This section is still to be completed

Examples
-------------

Please refer to https://github.com/Ocramius/ZfPhpcrOdmSample to see a working example of this module being used.