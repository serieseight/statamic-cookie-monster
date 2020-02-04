## Setup

1) First, copy `CookieMonster` into `site/addons/`.

2) Next, go eat a cookie... because you're done!

## Usage

### Tags

There are 3 tags available to `put`, `retrieve` and `check` cookies:

#### Put

This tag allows you to store a cookie as a key/value pair, expiring after the given amount of time (you can set a default expiry time via Cookie Monster's settings).

**Params**

| Name | Description |
|------|-------------|
| `key` | The name of the cookie. |
| `value` | The value of the cookie (do not store sensitive information). |
| `expires` | English textual datetime that is supported by [PHP's datetime format](http://php.net/manual/en/datetime.formats.php), e.g: `1 hour` or `30 days`. |

**Example**

```html
{{ cookie_monster:put key="loves" value="cookies" expires="30 days" }}
```

#### Retrieve

This tag will get a cookie's value using its key (nothing will be returned if the key is not found).

**Params**

| Name | Description |
|------|-------------|
| `key` | The name of the cookie. |

**Example**

```html
{{ cookie_monster:retrieve key="loves" }} // returns "cookies"
```

#### Check

This tag allows you to check if a cookie exists by returning a boolean.

**Params**

| Name | Description |
|------|-------------|
| `key` | The name of the cookie. |

**Example**

```html
{{ if ! {cookie_monster:check key="loves"} }}
  // User doesn't love anything :(
{{ /if }}
```

#### Hash

This tag allows you to hash a value using md5, this can be useful to automatically invalidate a cookie if the input changes (eg: the text in a callout banner).

**Params**

| Name | Description |
|------|-------------|
| `value` | The value to be hashed. |

**Example**

```html
{{ cookie_monster:hash value="lorem ipsum" }}

// or

{{ cookie_monster:hash :value="some_field" }}
```

**Usage**

```html
{{ if ! {cookie_monster:check key="{cookie_monster:hash :value="some_field"}"} }}
  // User doesn't have cookie for "some_field"
{{ /if }}
```

Note: see next tag for a nicer way to write this check.

#### Check Hash

This tag is syntactic sugar for when you're using the `check` and `hash` tags together.

**Params**

| Name | Description |
|------|-------------|
| `key` | The unhashed name of the cookie. |

**Example**

```html
{{ cookie_monster:check_hash key="lorem ipsum" }}

// or

{{ cookie_monster:check_hash :key="some_field" }}
```

**Usage**

```html
{{ if ! {cookie_monster:check_hash :key="some_field"} }}
  // User doesn't have cookie for "some_field"
{{ /if }}
```

### Middleware

You can configure which parameters to listen for, as well as set the cookie expiry time, via `CP > Configure > Addons > CookieMonster`

**Example**

If `loves` is added to Cookie Monster's settings, and a user hits the URL `https://domain.com?loves=cookies`, then Cookie Monster's middleware will automatically set a cookie of `loves=cookies`. This will be immediately available when the page loads, allowing you to fetch the cookie via JS right away. Params that haven't been added to Cookie Monster's settings will be ignored.

_Note: all cookies are set using PHP's `setcookies()` function, meaning they're **not** encrypted by Statamic/Laravel and will therefore be accessible on client-side via JS (this is by design)._

## Settings

| Name | Description |
|------|-------------|
| `parameters` | List of URL parameters to automatically set as a cookie. |
| `expires` | English textual datetime that is supported by [PHP's datetime format](http://php.net/manual/en/datetime.formats.php), e.g: `1 hour` or `30 days`. |
