<?php
/**
 * Menu Walkers
 *
 * Walkers come from Brett Mason (https://github.com/brettsmason) which can be found in the JointsWP Starter theme (http://jointswp.com).
 *
 * @package GenFound
 */

/**
 * Menu walker for Foundation's Top Bar menu component
 *
 * @since 0.1.0
 */
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

/**
 * Menu walker for Foundation's Off Canvas menu component
 *
 * @since 0.1.0
 */
class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical nested menu\">\n";
    }
}