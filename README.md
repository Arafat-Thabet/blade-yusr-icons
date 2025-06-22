# Blade Yusr Icons

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github-actions]][link-github-actions]
[![Static Analysis][ico-static-analysis]][link-static-analysis]
[![Total Downloads][ico-downloads]][link-downloads]

A package to easily make use of [Flaticon] and custom icons in your Laravel Blade views.

For a full list of available icons see [the SVG directory](./resources/svg).


## Requirements

- PHP 8.1 or higher
- Laravel 10.x or higher

## Installation

> **Note**: before installing package you should confirm that you already add git ssh key to your server or local machine
> you find guide of adding ssh key here [Generate ssh key](https://docs.gitlab.com/ee/ssh/)

in `repositories` section in composer.json add:

```
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/Arafat-Thabet/blade-yusr-icons",
      "options": {
        "symlink": true
      }
    }
  ]
```

Then run:

```
composer require yusr/blade-yusr-icons
```

## Configuration

Blade Font Awesome also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-yusr-icons.php` config file:

```shell
php artisan vendor:publish --tag=blade-yusr-icons-config
```

## Usage

Icons can be used a self-closing Blade components which will be compiled to SVG icons:

```blade
<x-fi-rr-home/>
```

You can also pass classes to your icon components:

```blade
<x-fi-rr-home class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-fi-rr-home style="color: #555"/>
```

custom Icons SVG icons:

```blade
<x-custom-link/>
```
For a full list of available icons see [the SVG directory](resources/svg).

### Icon Sets
- flaticon  Regular (`fi-rr`)
- custom (`custom`)
> Note: These are default prefixes for the specified icon sets, these can all be configured [in the `config/blade-yusr-icons.php` file](config/blade-yusr-icons.php).

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```shell
php artisan vendor:publish --tag=blade-yusr-icons --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-yusr-icons/flaticon-regular/fi-rr-0.svg') }}" width="10" height="10"/>
```

### flaticon interface-icons list


To explore flaticon list [vist flaticon site](https://www.flaticon.com/uicons/interface-icons) u


### Caching

Because of the sheer number of icons, a small performance hit can be seen when using *pro or kit-supplied* icons. If you'd like to mitigate this, you can cache the icons. To do this, run the following Artisan command:

```shell
php artisan icons:cache
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```shell
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.


## Credits

- [Arafat-Thabet][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


## Copyrights Arafat-Thabet Dev. Team

Contact: arafat.733011506@gmail.com