<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	// Styles
	//wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'theme-main-style', get_template_directory_uri() . '/dist/css/bundle.css' );
  // Scripts
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/dist/js/bundle.js', false, 1.0, true);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Clear WP HEAD
 */
require get_template_directory() . '/include/clear-wp-head.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/include/customizer.php';

/**
 * Create custom post types and taxonomy.
 */
require get_template_directory() . '/include/setup.php';

/**
 *  Add svg support
 * */
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Add theme option for ACF.
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

/**
 * Add class to menu-1(main-menu) item.
 */
function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'menu-1') {
        $classes[] = 'main-nav__item';
    }
    return $classes;
}
add_filter('nav_menu_css_class','atg_menu_classes',1,3);

/**
 * Add classes to menu-1(main-menu) links.
 */
function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'menu-1' ) {
        // add the desired attributes:
        $atts['class'] = 'main-nav__link js-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

/**
 * Remove editor for page-template.
 */
function remove_editor_init() {
    if ( is_admin() ) {
        $post_id = 0;
        if(isset($_GET['post'])) $post_id = $_GET['post'];
        $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
        if ($template_file == 'page-templates/template-home.php') {
            remove_post_type_support('page', 'editor');
        }
    }
}
add_action( 'init', 'remove_editor_init' );

/**
 * Add post thumbnail size.
 */
add_image_size( 'post-image', 350, 230, true );

/**
 * Crop text content function.
 */
require get_template_directory() . '/include/crop_text.php';

/**
 * Remove span el from cf7 form.
 */
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

/**
 * Remove br from wysiwyg.
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );