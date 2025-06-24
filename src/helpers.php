<?php

declare(strict_types=1);

use Yusr\BladeYusrIcons\Factory;
use Yusr\BladeYusrIcons\Svg;

if (! function_exists('yusrSvg')) {
    function yusrSvg(string $name, $class = '', array $attributes = []): Svg
    {
        return app(Factory::class)->svg($name, $class, $attributes);
    }
}
