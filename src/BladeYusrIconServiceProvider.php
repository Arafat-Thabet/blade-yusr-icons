<?php
declare(strict_types=1);
namespace Yusr\BladeYusrIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeYusrIconServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config');

            if (is_dir($proIconsPath = resource_path('icons/blade-yusr-icons'))) {
                $this->registerProIcons($factory, $proIconsPath, $config);

                return;
            }

            $factory->add('flaticon-regular', array_merge(['path' => __DIR__.'/../resources/svg/brands'], $config->get('blade-yusr-icons.flaticon-regular', [])));
            $factory->add('yusr-custom', array_merge(['path' => __DIR__.'/../resources/svg/solid'], $config->get('blade-yusr-icons.custom', [])));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-yusr-icons.php', 'blade-yusr-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-yusr-icons'),
            ], 'blade-yusr-icons');

            $this->publishes([
                __DIR__.'/../config/blade-yusr-icons.php' => $this->app->configPath('blade-yusr-icons.php'),
            ], 'blade-yusr-icons-config');

          
        }
    }

   
}
