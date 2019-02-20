<?php

namespace Statamic\Addons\CookieMonster;

use Closure;
use Statamic\Extend\Extensible;

class CookieMonsterMiddleware
{
    use Extensible;

    protected $parameters;

    protected $expires;

    public function __construct()
    {
        $this->parameters = $this->getConfig('parameters', []);
        $this->expires = $this->getConfig('expires');
    }

    public function handle($request, Closure $next)
    {
        if ($request->method() === 'GET' && ! empty($request->all())) {
            $this->setParamCookies($request->all());
        }

        return $next($request);
    }

    public function setParamCookies($params)
    {
        collect($params)->flip()->filter(function ($key) {
            return in_array($key, $this->parameters);
        })->each(function ($key, $value) {
            CookieMonster::put($key, $value, $this->expires);
        });
    }
}
