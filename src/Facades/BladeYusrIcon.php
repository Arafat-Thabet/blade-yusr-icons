<?php

namespace Yusr\BladeYusrIcons\Facades;

use Illuminate\Support\Facades\Facade;

class BladeYusrIcon extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'blade-yusr-icon';
    }
}
