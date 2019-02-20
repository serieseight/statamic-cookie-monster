<?php

namespace Statamic\Addons\CookieMonster;

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
        $expires = $this->get('expires', $this->getConfig('expires'));

        CookieMonster::put($this->get('key'), $this->get('value'), $expires);
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
