<?php

namespace App\Providers;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('custom', [
                'path'   => resource_path('svg'),
                'prefix' => 'custom',
            ]);
        });
    }

    public function boot(): void
    {
        //
    }
}
