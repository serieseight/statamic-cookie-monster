<?php

namespace Statamic\Addons\CookieMonster;

use Statamic\Extend\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class CookieMonsterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app[Kernel::class]->pushMiddleware(CookieMonsterMiddleware::class);
    }
}
