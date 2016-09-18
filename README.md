<img src="http://i.imgur.com/klRglRT.png" alt="Browser" align="left" height="60" />

# Browser *for Craft CMS*

Gathers server-side information on the users agent data.

##Table of Contents

- [Dependencies](#dependencies)
- [Is](#is)
- [Data](#data)
- [Full](#full)
- [Local](#locl)

##Dependencies

- [Agent by Jens Segers](https://github.com/jenssegers/agent)
- [Mobile Detect](http://mobiledetect.net/)

## Is

Perform a number of checks to determine wether the users browser type is a match. Returns ```boolean```.

####Example 1:
Returns true if current browser is either 'IE, Edge, or Firefox'
```
{{ browser.is('ie edge firefox') }}
```

####Example 2:
Exactly the same as example one, but demonstrates you can pass as many arguments as you like. Each argument is handled as an "or" not an "and".
```
{{ browser.is('ie', 'edge', 'firefox') }}
```

####Example 3:
Returns true if current browser is greater than IE 9
```
{{ browser.is('ie 9 >') }}
```

####Example 4:
Returns true if current browser is greater or equal to IE 9
```
{{ browser.is('ie => 9') }}
```

####Example 5:
Returns true if current browser is either, IE version 9 or 10, Chrome version 50 or above, or Firefox any version
```
{{ browser.is('ie 9 10', 'chrome > 49', 'firefox') }}
```

####Example 6:
Just an example of how if the same function would be formatted for php
```php
craft()->browser->is('chrome 48');
```

----
## Data

Echo out's a data attribute with name and version number. Ideal for querying via Javascript or CSS

#### Example
```
{{ browser.data|default }}
```

#### Example Output
```html
data-browser="chrome 52"
```

#### Example Output: jQuery Usage
```js
if ( $('html[data-browser^=chrome]').length ) {...}
```

#### Example Output: CSS Usage
```css
html[data-browser^=chrome] {...}
```

----
## Full

Simply returns the name and version of the users browser.

Returns browser name and version number in an array
```
{{ browser.full }}
```

Returns browser name
```
{{ browser.full.name }}
```

Returns version number
```
{{ browser.full.version }}
```

## Local
A very quick check to see if you are on a local or live server. Returns ```Boolean```
```
{{ local }}
```
