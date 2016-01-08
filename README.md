# wp-genfound
Foundation for Sites and the Genesis Framwork.

## Enqueueing Scripts & Stylesheets with `genfound_enqueue()`

This theme includes a special enqueueing function, `genfound_enqueue()` that can be used in the place of both `wp_enqueue_style()` and `wp_enqueue_script()`. This function exists for the sake of a using minified files on the production site and non-minified files on the local development site. The point being not having to make sure you've added `.min` to your filepaths or be stuck outputting minified versions of your built files in development.

This function should be used in the exact same way you would use either of the core WordPress functions, the difference is that there is no need to call `get_stylesheet_directory_uri()` when passing a value for `$src`. Only a relative filepath is required.

By passing a file with that is not minified through `$src`, this function will then check if a minified version exists. If it, in fact, does exist, then the minified file will be enqueue instead of the originally defined file. If there is no minified version, then everything just continues on.

If a minifed file is passed, such as `app.min.js` then all previous functionality is overridden and the function operates in the normal manner that the core WordPress functions would operate.

This function also automatically detects if you are trying to enqueue a script or a style.

### Examples

#### Enqueueing Scripts

Using WordPress core function

```php	
wp_enqueue_script( 'main-javascript', get_stylesheet_directory_uri() . '/js/app.js', array('jquery'), '', true );
```

Using GenFound enqueueing function

```php
genfound_enqueue( 'main-javascript', 'js/app.js', array('jquery'), '', true );
```

#### Enqueueing Styles

Using WordPress core function

```php
wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/css/app.css' );
```
Using GenFound enqueueing function

```php
genfound_enqueue( 'main-stylesheet', 'css/app.css' );
```


