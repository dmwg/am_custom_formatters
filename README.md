# Custom field formatters for Africa Multiple WissKI

![CI workflow](https://github.com/dmwg/am_custom_formatters/actions/workflows/ci.yml/badge.svg?branch=main) [![Packagist Version](https://img.shields.io/packagist/v/dmwg/am_custom_formatters)](https://packagist.org/packages/dmwg/am_custom_formatters) [![Packagist Downloads](https://img.shields.io/packagist/dt/dmwg/am_custom_formatters)](https://packagist.org/packages/dmwg/am_custom_formatters) [![GitHub License](https://img.shields.io/github/license/dmwg/am_custom_formatters)](https://packagist.org/packages/dmwg/am_custom_formatters) [![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/dmwg/am_custom_formatters/php)](https://packagist.org/packages/dmwg/am_custom_formatters)

Custom field formatters for dealing with things that are strings, but should
display as something else.  We require this approach over using `image` or `uri`
type fields, as a third-party API we depend on can't handle these fields types,
and only accepts plain strings.

## Requirements

* PHP `^8.2`
* `drupal/core` (tested on `10.3`)[^1]

[^1]: Older versions might work fine.

## Installation

```shell
# composer require dmwg/am_custom_formatters
```

## Usage

1. Enable this module, either via `/admin/modules`, or `drush pm:install am_custom_formatters`
2. Set the desired field's display formatter to one provided by this package
3. `drush cr`
4. ???
5. Profit!

## Contributing

We welcome all and any contributions via Pull Requests to this repository!

### Local development environment

For local development, it is **highly recommended** to install this module into
an existing Drupal codebase, e.g., under `web/modules/custom`.

The following example assumes an installation, and clones into `web/modules/custom`:

```shell
# cd <DRUPAL_ROOT>/web/modules/custom
# git clone https://github.com/dmwg/am_custom_formatters
# cd am_custom_formatters
# composer install
```

### Linting & Static analysis

Please run `vendor/bin/phpcs --standard=Drupal` and fix any flagged errors;
`vendor/bin/phpcbf --standard=Drupal src` can assist.

Please run `vendor/bin/phpstan` and fix any errors; don't let a failing build
discourage you, we'll try and figure it out in the PR.

## Authors and acknowledgment

* `Oliver Baumann <oliver.baumann@uni-bayreuth.de>`
   * Maintenance

## Project status

Alive, but dormant.
