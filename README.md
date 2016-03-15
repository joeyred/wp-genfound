# wp-genfound

Foundation for Sites 6 and the Genesis Framwork brought together in an easy to use starter theme.

**Current Version:** 0.1.1

This starter theme is still a work in progress and has some major features left to be added as of yet. This also means that a lot of this theme's structure and files are liable to change a lot before version 1.0.0 is reached.

The goal of this theme is to not only merge the Foundation and Genesis frameworks, but to keep the Foundation components and plugins as modular as possible so as to allow including only the components from Foundation you require.

## Features

- Support for use of Flex or Float grid.
- Gulp, Bower, Sass workflow.
- Easy use of Foundation menu components.
- Easy to use configuration of grid classes in Genesis markup.
- Pretty cool enqueueing function that takes care of using minified files if they exist without having to edit the file names passed into the function. 

## Installation

This theme uses a gulp.js and Bower workflow and requires Node.js and Node Package Manager be installed on your computer.

Open up terminal at the theme directory and run 

```bash
npm install
```
After that, you can either run 

```bash
bower install
```

or you can run the guild build task which will take care of it while building out your initial CSS and JS.

The task is called `build` so just run the command like so

```bash
gulp build
```

That should be the only time you need to run this task as the development task used in the default task will take care of updating with bower, cleaning old compiled files and sourcemaps, outputting new ones, and starting up the watch task.

## Gulp

The default gulp task builds all necessary files, starts Browsersync, and starts the watch tasks. To exit this just hit `control` + `c`. 

**Note:** *This file is currently incomplete and set up for development only. This will be updated as the theme gets closer to version 1.0.0* 

## Bower

Bower is used to manage Foundation, jQuery, and the Motion UI library. Running the default Gulp task will update dependancies managed by Bower.

## Flex Grid Support

This theme uses the Foundation Float Grid component by default, however it is extremely easy to switch to the Flex Grid if you choose to use it. 

The new Flexbox Grid that foundation as added as a component to Foundation for Sites 6 uses much of the same classes as the Float Grid, however there are major differences in its useable features such as horizontal and vertical alignment, automatic sizing, and much easier source ordering. Because of this there has to be two seperate configuration files that determine the classes that are added to the Genesis markup, and so to use the Flex Grid, the Float Grid must be turned off.

**Note:** *As of now there is no support for using both grids at the same time. It's probably still possible to impliment both grids as the Foundation docs suggests, which is via scss mixins only, but that is completely untested here, and there are no plans to test this in the future. Considering the reason for using the float grid is mostly compatability with older browsers, I don't see a reason to mix the two.*

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

The configuration files are explained in more detail further down, but all you have to do now if you want to change some of the classes in the Genesis markup, use the `grid-config-flex.php` file located in `/inc/foundation/config/`. 

## Enqueueing Scripts & Stylesheets with `genfound_enqueue()`

This theme includes a special enqueueing function, `genfound_enqueue()` that can be used in the place of both `wp_enqueue_style()` and `wp_enqueue_script()`. This function exists for the sake of a using minified files on the production site and non-minified files on the local development site. The point being not having to make sure you've added `.min` to your filepaths or be stuck outputting minified versions of your built files in development.

This function should be used in the exact same way you would use either of the core WordPress functions, the difference is that there is no need to call `get_stylesheet_directory_uri()` when passing a value for `$src`. Only a relative filepath is required.

By passing a file that is not minified through `$src`, this function will then check if a minified version exists. If it, in fact, does exist, then the minified file will be enqueue instead of the originally defined file. If there is no minified version, then everything just continues on.

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

## Menu Components

Foundation 6 has redone how menus are handled. There are now menu components that can be housed in whatever wrapper or container you wish. This allows for a much more flexable way to create navigation menus.

The function, `genfound_menu_component()`, aims to easily utilize and impliment these components.

This function has two values that must be passed, `$component` and `$theme_location`. Both values are passed as strings, with `$component` designating which Foundation menu component you wish to generate and `$theme_location` designating which registered menu location to use. The accepted values for `$component` are:

- `'drilldown'`
- `'accordion'`
- `'dropdown'`

## Config Files

There are a few configuration files included for the sake of simplicity in editing classes added to the Genesis markup. All PHP configuration files are located in `/inc/foundation/config/`.
