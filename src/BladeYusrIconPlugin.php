<?php

namespace Yusr\BladeYusrIcons;

use Filament\Contracts\Plugin;
use Filament\Panel;

class BladeYusrIconPlugin implements Plugin
{
    public function register(Panel $panel): void {}
    public function boot(Panel $panel): void
    {
      
    }
    public function getId(): string
    {
        return 'blade-yusr-icon';
    }

    public static function make(): static
    {
        return app(static::class);
    }



    protected function getPluginBasePath($path = null): string
    {
        $reflector = new \ReflectionClass(get_class($this));

        return dirname($reflector->getFileName()) . ($path ?? '');
    }

}
