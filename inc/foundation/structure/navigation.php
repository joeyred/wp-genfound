<?php
/**
 * Navigation using Foundation 6 markup
 *
 * @package GenFound
 */

// Remove Genesis Menus
remove_theme_support( 'genesis-menus' );

add_action( 'init', 'genfound_register_menus' );
// Register Theme location for Primary Menu
function genfound_register_menus() {
	register_nav_menus( 
		array(
			'primary' => __( 'Primary Navigation' ),
			'test' 	  => __('Testing')
		)
	);
}

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
		    	<?php genfound_menu_component( 'drilldown', 'primary' ); ?>
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
				<?php genfound_menu_component( 'dropdown', 'primary' ); ?>
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







