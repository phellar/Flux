<?php

namespace Phellar\Scaffold;

use Phellar\Scaffold\Commands\ScaffoldCommand;
use Scaffold\PaymentManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScaffoldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('scaffold')
            ->hasConfigFile()
            ->hasCommand(ScaffoldCommand::class);
    }

    public function register()
    {
        // Merge config so users can override
        $this->mergeConfigFrom(__DIR__.'/../config/scaffold.php', 'scaffold');

        // Bind PaymentManager to container
        $this->app->singleton('payment', function ($app) {
            return new PaymentManager($app);
        });
    }
}
