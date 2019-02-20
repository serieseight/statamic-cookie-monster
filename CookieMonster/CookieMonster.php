<?php

namespace Statamic\Addons\CookieMonster;

class CookieMonster
{
    public static function put($key, $value, $expires = '1 day', $path = '/')
    {
        $minutes = strtotime($expires);

        setcookie($key, $value, $minutes, $path);
    }

    public static function get($key)
    {
        return $_COOKIE[$key] ?? null;
    }

    public static function check($key)
    {
        return !! self::get($key);
    }
}
