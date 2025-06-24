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
if (! function_exists('getSvg')) {
    function getSvg(string $name, $class = 'fi-btn-icon transition duration-75 h-5 w-5 text-white', array $attributes = ['fill'=>'#fff'])
    {
        return 'data:image/svg+xml;base64,' . base64_encode(yusrSvg($name, $class, $attributes)->toHtml());
    }
}
