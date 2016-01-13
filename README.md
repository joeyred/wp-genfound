# wp-genfound
Foundation for Sites and the Genesis Framwork.

## Gulp

## Bower

## Flex Grid Support

This theme uses the Foundation Float Grid component by default, however it is extremely easy to switch to the Flex Grid if you choose to use it. 

The new Flexbox Grid that foundation as added as a component to Foundation for Sites 6 uses much of the same classes as the Float Grid, however there are major differences in its useable features such as horizontal and vertical alignment, automatic sizing, and much easier source ordering. Because of this there has to be two seperate configuration files that determine the classes that are added to the Genesis markup, and so to use the Flex Grid, the Float Grid must be turned off.

**Note:** *As of now there is no support for using both grids at the saem time. It's probably still possible to impliment both grids as the Foundation docs suggests, which is via scss mixins only, but that is completely untested here, and there are no plans to test this in the future. Considering the reason for using the float grid is mostly compatability with older browsers, I don't see a reason to mix the two.*

### Steps to using the Flex Grid

#### 1. Add theme support for the grid in `functions.php`

Simply add this code to your main `functions.php` and the float grid will be swapped out for the flex gird. 

```php
add_theme_support( 'genfound-flex-grid' );
```
This will take out the float grid and replace it with the flex grid. The float grid config file won't be loaded.

#### 2. Include the Flex Grid css

in your `app.scss` file, where all of the foundation styles are brought in, replace the `foundation-grid` mixin with the `foundation-flex-gird` mxixin, exactly as it is outlined in the [Foundation 6 docs](http://foundation.zurb.com/sites/docs/flex-grid.html#importing).

```scss
@import 'foundation';

// @include foundation-grid;
@include foundation-flex-grid;
```
Again, you are only suppose to include one grid here.

#### 3. Use correct configuration file

The configuration files are explained in more detail further down, but all you have to do now if you want to change some of the classes in teh Genesis markup, use the `grid-config-flex.php` file located in `/inc/foundation/config/`. 

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

## Config Files

There are a few configuration files included for the sake of simplicity in editing classes added to the Genesis markup. All PHP configuration files are located in `/inc/foundation/config/`.
