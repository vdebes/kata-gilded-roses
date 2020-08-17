# GildedRose Kata - PHP Version
From [Emily Bache's repository](https://github.com/emilybache/GildedRose-Refactoring-Kata)

See the [top level readme](https://github.com/emilybache/GildedRose-Refactoring-Kata/blob/master/README.md) for general information about this exercise. This is the PHP version of the
 GildedRose Kata. You'll also want to look at the ["Gilded Rose Requirements"](./GildedRoseRequirements.txt) which explains what the code is for.

## Installation

The kata uses:

- PHP 7.2+
- [Composer](https://getcomposer.org)

Recommended:
- [Git](https://git-scm.com/downloads)

Clone the repository

```sh
git clone git@github.com:vdebes/kata-gilded-roses.git
```

or

```shell script
git clone https://github.com/vdebes/kata-gilded-roses.git
```

Install all the dependencies using composer

```shell script
cd kata-gilded-roses
composer install
```

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [ApprovalTests.PHP](https://github.com/approvals/ApprovalTests.php)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard) 
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Folders

- `src` - contains the two classes:
  - `Item.php` - this class should not be changed.
  - `GildedRose.php` - this class needs to be refactored, and the new feature added.
- `tests` - contains the tests
  - `GildedRoseTest.php` - Starter test.
  - `ApprovalTest.php` - alternative approval test (set to 30 days)
- `Fixture`
  - `texttest_fixture.php` used by the approval test, or can be run from the command line

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the
 root of the PHP project run:

```shell script
composer test
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening **index.html** in your browser.

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used. The current code is not
 upto standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

### Fix Code

There are may code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

**Happy coding**!
