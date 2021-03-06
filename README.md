# GaufretteFilesystemBridgeBundle
> Symfony bundle that glues FileBundle and GaufretteFilesystemBridge

[![Build Status](https://travis-ci.org/BenGorFile/GaufretteFilesystemBridgeBundle.svg?branch=master)](https://travis-ci.org/BenGorFile/GaufretteFilesystemBridgeBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BenGorFile/GaufretteFilesystemBridgeBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BenGorFile/GaufretteFilesystemBridgeBundle/?branch=master)
[![Total Downloads](https://poser.pugx.org/bengor-file/gaufrette-filesystem-bridge-bundle/downloads)](https://packagist.org/packages/bengor-file/gaufrette-filesystem-bridge-bundle/)
[![Latest Stable Version](https://poser.pugx.org/bengor-file/gaufrette-filesystem-bridge-bundle/v/stable.svg)](https://packagist.org/packages/bengor-file/gaufrette-filesystem-bridge-bundle/)
[![Latest Unstable Version](https://poser.pugx.org/bengor-file/gaufrette-filesystem-bridge-bundle/v/unstable.svg)](https://packagist.org/packages/bengor-file/gaufrette-filesystem-bridge-bundle/)

## Requirements
PHP >= 5.5</br>
Symfony >= 2.8 

## Installation
The easiest way to install this component is using [Composer][6]
```bash
$ composer require bengor-file/gaufrette-filesystem-bridge-bundle
```

## Documentation
All the documentation is stored inside the [file bundle](https://github.com/BenGorFile/FileBundle/blob/master/docs/index.md).

## Tests
This bundle is completely tested by **[PHPSpec][1], SpecBDD framework for PHP**.

Run the following command to launch tests:
```bash
$ vendor/bin/phpspec run -fpretty
```

## Contributing
If you have any doubt or maybe you want to share some opinion, you can use our **Gitter** chat.

[![Join the chat at https://gitter.im/BenGorFile/File](https://badges.gitter.im/BenGorFile/File.svg)](https://gitter.im/BenGorFile/File?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

This bundle follows PHP coding standards, so pull requests need to execute the Fabien Potencier's [PHP-CS-Fixer][5].
Furthermore, if the PR creates some not-PHP file remember that you have to put the license header manually. In order
to simplify we provide a Composer script that wraps all the commands related with this process.
```bash
$ composer run-script cs
```

There is also a policy for contributing to this project. Pull requests must be explained step by step to make the
review process easy in order to accept and merge them. New methods or code improvements must come paired with
[PHPSpec][1] tests.

If you would like to contribute it is a good point to follow Symfony contribution standards, so please read the
[Contributing Code][2] in the project documentation. If you are submitting a pull request, please follow the guidelines
in the [Submitting a Patch][3] section and use the [Pull Request Template][4].

## Credits
This bundle is created by:
>
**@benatespina** - [benatespina@gmail.com](mailto:benatespina@gmail.com)<br>
**@gorkalaucirica** - [gorka.lauzirika@gmail.com](mailto:gorka.lauzirika@gmail.com)

## Licensing Options
[![License](https://poser.pugx.org/bengor-file/gaufrette-filesystem-bridge-bundle/license.svg)](https://github.com/BenGorFile/GaufretteFilesystemBridgeBundle/blob/master/LICENSE)

[1]: http://www.phpspec.net/
[2]: http://symfony.com/doc/current/contributing/code/index.html
[3]: http://symfony.com/doc/current/contributing/code/patches.html#check-list
[4]: http://symfony.com/doc/current/contributing/code/patches.html#make-a-pull-request
[5]: http://cs.sensiolabs.org/
[6]: http://getcomposer.org
