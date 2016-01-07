<?php
/**
 * Navigation using Foundation 6 markup
 *
 * @package GenFound
 */

include_once( get_stylesheet_directory() . '/inc/foundation/inc/navigation/menu-walkers.php' );

include_once( get_stylesheet_directory() . '/inc/foundation/inc/navigation/responsive-navigation.php' );

// Remove Genesis Menus
remove_theme_support( 'genesis-menus' );

add_action( 'init', 'genfound_register_menus' );
// Register Theme location for Primary Menu
function genfound_register_menus() {
	register_nav_menus( 
		array(
			'primary' => __( 'Primary Navigation' )
		)
	);
}

// The Top Menu
function genfound_top_bar_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical medium-horizontal menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function
        'walker' => new Topbar_Menu_Walker()
    ));
} /* End Top Menu */

// The Off Canvas Menu
function genfound_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu',       			// Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-drilldown>%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function
        'walker' => new Off_Canvas_Menu_Walker()
    ));
} /* End Off Canvas Menu */

add_action( 'genesis_before', 'genfound_off_canvas_markup_open' );
/**
 * Off Canvas menu markup opening
 *
 * @return void
 */
function genfound_off_canvas_markup_open() {

	?>
	<div class="off-canvas-wrapper">
    	<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
		    	<?php genfound_off_canvas_nav(); ?>
		    </div>

		    <div class="off-canvas-content" data-off-canvas-content>
    <?php
}
add_action( 'genesis_after', 'genfound_off_canvas_markup_close' );
/**
 * Off Canvas menu markup closing
 *
 * @return void
 */
function genfound_off_canvas_markup_close() {

	echo '</div></div></div>';
}

add_action( 'genesis_after_header', 'genfound_top_bar_markup' );
function genfound_top_bar_markup() {

	?>
		<div class="top-bar show-for-medium">
			<div class="top-bar-left">
				<ul class="menu" data-dropdown-menu>

					<a href="<?php bloginfo( 'url' ); ?>">
						<li class="menu-text"><?php bloginfo( 'name' ); ?></li>
					</a>
				</ul>
			</div>

			<div class="top-bar-right">
				<?php genfound_top_bar_nav(); ?>
			</div>
		</div>
	<?php
}

add_action( 'genesis_before', 'genfound_off_canvas_title_bar' );
function genfound_off_canvas_title_bar() {

	?>
	<div class="title-bar show-for-small-only">
		<div class="title-bar-left">
			<button class="menu-icon" type="button" data-open="offCanvas"></button>
			<span class="title-bar-title">
				<a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
			</span>
		</div>
		<div class="title-bar-right">
			<button class="menu-icon" type="button" data-open="offCanvasRight"></button>
		</div>
	</div>
	<?php
}










