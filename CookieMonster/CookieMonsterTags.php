<?php

namespace Statamic\Addons\CookieMonster;

use Carbon\Carbon;
use Statamic\Extend\Tags;

class CookieMonsterTags extends Tags
{
    /**
     * The {{ cookie_monster:put }} tag
     *
     * @return array
     */
    public function put()
    {
        $minutes = Carbon::parse($this->get('expires'), '1 day')->getTimestamp();

        CookieMonster::put($this->get('key'), $this->get('value'), $minutes);
    }

    /**
     * The {{ cookie_monster:retrieve }} tag
     *
     * @return array
     */
    public function retrieve()
    {
        return CookieMonster::get($this->get('key'));
    }

    /**
     * The {{ cookie_monster:check }} tag
     *
     * @return array
     */
    public function check()
    {
        return CookieMonster::check($this->get('key'));
    }
}
