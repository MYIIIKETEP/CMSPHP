<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '2.2.2' );

if ( ! function_exists( 'generate_setup' ) ) {
	add_action( 'after_setup_theme', 'generate_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function generate_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array() );
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'custom-logo', array(
			'height' => 70,
			'width' => 350,
			'flex-height' => true,
			'flex-width' => true,
		) );

		// Register primary menu.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'generatepress' ),
		) );

		/**
		 * Set the content width to something large
		 * We set a more accurate width in generate_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'css/admin/editor-style.css' );
	}
}

/**
 * Get all necessary theme files
 */
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/class-css.php';
require get_template_directory() . '/inc/css-output.php';
require get_template_directory() . '/inc/general.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/markup.php';
require get_template_directory() . '/inc/typography.php';
require get_template_directory() . '/inc/plugin-compat.php';
require get_template_directory() . '/inc/block-editor.php';
require get_template_directory() . '/inc/migrate.php';
require get_template_directory() . '/inc/deprecated.php';

if ( is_admin() ) {
	require get_template_directory() . '/inc/meta-box.php';
	require get_template_directory() . '/inc/dashboard.php';
}

/**
 * Load our theme structure
 */
require get_template_directory() . '/inc/structure/archives.php';
require get_template_directory() . '/inc/structure/comments.php';
require get_template_directory() . '/inc/structure/featured-images.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/navigation.php';
require get_template_directory() . '/inc/structure/post-meta.php';
require get_template_directory() . '/inc/structure/sidebars.php';



add_action( 'init', 'add_custom_post_types');

function add_custom_post_types() {
  $labels = array(
    'name'               => _x( 'StreamInfo', 'post type general name' ),
    'singular_name'      => _x( 'StreamInfo', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'StreamInfo' ),
    'add_new_item'       => __( 'Add New StreamInfo' ),
    'edit_item'          => __( 'Edit StreamInfo' ),
    'new_item'           => __( 'New StreamInfo' ),
    'all_items'          => __( 'All StreamInfo' ),
    'view_item'          => __( 'View StreamInfo' ),
    'search_items'       => __( 'Search StreamInfo' ),
    'not_found'          => __( 'No StreamInfo found' ),
    'not_found_in_trash' => __( 'No StreamInfo found in the Trash' ), 
    'menu_name'          => 'StreamInfo'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our StreamInfo and StreamInfo specific data',
    'public'        => true,
    /* This is important, it makes it so that we can add custom archive pages */
    'has_archive'   => true,
    /* the next one is important, it tells what's enabled in the post editor */
    'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
  );
  register_post_type('StreamInfo', $args);
}

