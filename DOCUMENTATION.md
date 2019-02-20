## Setup

1) First, copy `CookieMonster` into `site/addons/`.

2) Next, go eat a cookie... because you're done!

## Usage

### Tags

There are 3 tags available to `put`, `retrieve` and `check` cookies:

#### Put

This tag allows you to store a cookie as a key/value pair, expiring after the given amount of time (you can set a default expiry time via CookieMonster's settings).

**Params**

| Name | Description |
|------|-------------|
| `key` | The name of the cookie. |
| `value` | The value of the cookie (do not store sensitive information). |
| `expires` | English textual datetime that is supported by [PHP's datetime format](http://php.net/manual/en/datetime.formats.php), e.g: `1 hour` or `30 days`. |

```html
{{ cookie_monster:put key="loves" value="cookies" expires="30 days" }}
```

#### Retrieve

This tag will get a cookie's value using its key (nothing will be returned if the key is not found).

**Params**

| Name | Description |
|------|-------------|
| `key` | The name of the cookie. |

```html
{{ cookie_monster:retrieve key="loves" }} // returns "cookies"
```

#### Check

This tag allows you to check if a cookie exists by returning a boolean.

**Params**

| Name | Description |
|------|-------------|
| `key` | The name of the cookie. |

```html
{{ if {cookie_monster:check key="loves"} }}
  // User loves something!
{{ /if }}
```

### Middleware

You can configure which params to listen for and the cookie expiry time via `CP > Configure > Addons > CookieMonster`.

Note: all cookies are set using PHP's `setcookies()` function, meaning they're **not** encrypted by Statamic/Laravel and will therefore be accessible on client-side via JS (this is by design).

## Settings

| Name | Description |
|------|-------------|
| `parameters` | List of URL params to automatically set as a cookie. |
| `expires` | English textual datetime that is supported by [PHP's datetime format](http://php.net/manual/en/datetime.formats.php), e.g: `1 hour` or `30 days`. |
