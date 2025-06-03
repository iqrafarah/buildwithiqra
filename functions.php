<?php

/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package CustomBoilerTheme
 * @since 1.0
 */

function enqueue_styles() {
	// Get theme version
	$theme_version  = wp_get_theme()->get( 'Version' );
	$version_string = is_string( $theme_version ) ? $theme_version : '1.0.0';

	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/style.css', [], $version_string );
	wp_enqueue_style( 'global-style', get_template_directory_uri() . '/assets/css/globals.css', [], $version_string );
	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '5.3.1' );
}

function enqueue_scripts() {
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true );
	wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '5.3.1', true );
}

// Register widget areas
function boiler_theme_widgets_init() {
	for ( $i = 1; $i <= 4; $i ++ ) {
		register_sidebar( array(
			'name'          => "Footer Area $i",
			'id'            => "footer_area_$i",
			'description'   => "Footer column $i",
			'before_widget' => "<section class='footer-area footer-area-$i'>",
			'after_widget'  => '</section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
	}

	register_sidebar( array(
		'name'          => 'Menu Right Bar',
		'id'            => 'menu_right_bar',
		'description'   => 'Right side of the nav bar',
		'before_widget' => '<div class="navbar-widget menu_right_bar ml-auto mb-2 mb-lg-0">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'boiler_theme_widgets_init' );

// Support for custom logo
function boiler_theme_custom_logo() {
	add_theme_support( 'custom-logo', array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true,
	) );
}

add_action( 'after_setup_theme', 'boiler_theme_custom_logo' );

// Register theme menus
function boiler_theme_menus() {
	register_nav_menus( array(
		'main-menu' => 'Main Menu',
	) );
}

add_action( 'init', 'boiler_theme_menus' );

// Display the main menu
function boiler_theme_display_menu() {
	wp_nav_menu( array(
		'theme_location' => 'main-menu',
		'menu_class'     => 'navbar-nav ' . get_theme_mod( 'navbar_layout' ) . ' ml-4 mb-2 mb-lg-0',
		'container'      => false,
		'depth'          => 2,
		'walker'         => new Boiler_Nav_Walker(),
	) );
}

add_action( 'main_menu', 'boiler_theme_display_menu' );

// Custom nav walker
class Boiler_Nav_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = implode( ' ', array_filter( [
			'nav-item',
			in_array( 'menu-item-has-children', $item->classes ) ? 'dropdown' : '',
		] ) );

		$output .= "<li class=\"$classes\">";

		$attributes = 'class="nav-link';
		$attributes .= in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ? ' dropdown-toggle" data-bs-toggle="dropdown"' : '"';
		$attributes .= ' href="' . esc_attr( $item->url ) . '"';

		$output .= sprintf( '<a %s>%s</a>', $attributes, esc_html( $item->title ) );
	}

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '<ul class="dropdown-menu ' . get_theme_mod( 'navbar_theme' ) . '">';
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</ul>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}

// Add Customizer settings
function boiler_theme_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'theme_options_panel', array(
		'title'       => __( 'Theme Options', 'boiler' ),
		'description' => __( 'Modify layout, colors, and more.', 'boiler' ),
		'priority'    => 160,
	) );

	$wp_customize->add_section( 'navbar_layout_section', array(
		'title' => __( 'Navbar Settings', 'boiler' ),
		'panel' => 'theme_options_panel',
	) );

	$wp_customize->add_setting( 'navbar_layout', array( 'default' => '', 'type' => 'theme_mod' ) );
	$wp_customize->add_control( 'navbar_layout', array(
		'label'   => 'Navbar Position',
		'section' => 'navbar_layout_section',
		'type'    => 'select',
		'choices' => array(
			'me-auto' => 'Left',
			'mx-auto' => 'Center',
			'ms-auto' => 'Right',
		),
	) );

	$wp_customize->add_setting( 'navbar_theme', array( 'default' => '', 'type' => 'theme_mod' ) );
	$wp_customize->add_control( 'navbar_theme', array(
		'label'   => 'Navbar Theme',
		'section' => 'navbar_layout_section',
		'type'    => 'select',
		'choices' => array(
			'navbar-dark bg-dark'   => 'Dark',
			'navbar-light bg-light' => 'Light',
		),
	) );

	$wp_customize->add_setting( 'facebook_link', array( 'default' => '', 'type' => 'option' ) );
	$wp_customize->add_control( 'facebook_link', array(
		'label'   => 'Facebook URL',
		'section' => 'title_tagline',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'twitter_link', array( 'default' => '', 'type' => 'option' ) );
	$wp_customize->add_control( 'twitter_link', array(
		'label'   => 'Twitter URL',
		'section' => 'title_tagline',
		'type'    => 'url',
	) );
}

add_action( 'customize_register', 'boiler_theme_customize_register' );

// Maintenance and cleanup
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );
add_action( 'admin_menu', function () {
	remove_menu_page( 'edit-comments.php' );
} );
add_action( 'init', function () {
	if ( is_admin_bar_showing() ) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
	}
} );
add_filter( 'auto_core_update_send_email', '__return_false' );
add_filter( 'auto_plugin_update_send_email', '__return_false' );
add_filter( 'auto_theme_update_send_email', '__return_false' );
add_filter( 'xmlrpc_enabled', '__return_false' );


add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
