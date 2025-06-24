<?php

declare(strict_types=1);

namespace Yusr\BladeYusrIcons;

use Yusr\BladeYusrIcons\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Yusr\BladeYusrIcons\Components\Icon;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\Filesystem\Factory as FilesystemFactory;
use Illuminate\Filesystem\Filesystem;
use Yusr\BladeYusrIcons\IconsManifest;

class BladeYusrIconServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
        $this->registerFactory();
        $this->registerManifest();
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-yusr-icons.php', 'blade-yusr-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-yusr-icons'),
            ], 'blade-yusr-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-yusr-icons.php' => $this->app->configPath('blade-yusr-icons.php'),
            ], 'blade-yusr-icons-config');
        }
        $this->bootDirectives();
        $this->bootIconComponent();
    }

    private function registerFactory(): void
    {
        $this->app->singleton(Factory::class, function (Application $app) {
            $config = config('blade-yusr-icons');
            $factory = new Factory(
                new Filesystem,
                $app->make(IconsManifest::class),
                $app->make(FilesystemFactory::class),
                $config,
            );

            foreach ($config ?? [] as $set => $options) {
                if (! isset($options['disk']) || ! $options['disk']) {
                    $paths = $options['paths'] ?? $options['path'] ?? [];
                    if (empty($paths)) {
                        $options['paths'] = [__DIR__ . '/../resources/svg/' . $set];
                    }
                }

                $factory->add($set, $options);
            }

            return $factory;
        });

        $this->callAfterResolving(ViewFactory::class, function ($view, Application $app) {
            $app->make(Factory::class)->registerComponents();
        });
    }
    private function registerManifest(): void
    {
        $this->app->singleton(IconsManifest::class, function (Application $app) {
            return new IconsManifest(
                new Filesystem,
                $this->manifestPath(),
                $app->make(FilesystemFactory::class),
            );
        });
    }

    private function manifestPath(): string
    {
        return $this->app->bootstrapPath('cache/yusr-blade-icons.php');
    }
    private function bootDirectives(): void
    {
        Blade::directive('yusrSvg', fn($expression) => "<?php echo e(yusrSvg($expression)); ?>");
    }

    private function bootIconComponent(): void
    {
        Blade::component('yusr-icon', Icon::class);
    }
}
