<?php
/**
 * Mejorcamara functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mejorcamara
 */

if ( ! function_exists( 'mejorcamara_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mejorcamara_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Mejorcamara, use a find and replace
	 * to change 'mejorcamara' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mejorcamara', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
		'primary' => esc_html__( 'Primary', 'mejorcamara' ),
                'social'  => __( 'Social Links Menu', 'mejorcamara' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mejorcamara_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mejorcamara_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mejorcamara_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mejorcamara_content_width', 640 );
}
add_action( 'after_setup_theme', 'mejorcamara_content_width', 0 );

//Ads the searchbar to the navigation
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
    $items .= '<li class="search-nav">' . get_search_form( false ) . '</li>';
    return $items;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mejorcamara_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mejorcamara' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mejorcamara' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mejorcamara_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mejorcamara_scripts() {
	wp_enqueue_style( 'mejorcamara-style', get_stylesheet_uri() );

        if (is_singular('reviews')) {
            wp_enqueue_style( 'mejorcamara-review-style', get_template_directory_uri() .'/css/reviews.css' );
            wp_enqueue_script( 'mejorcamara-navigation', get_template_directory_uri() . '/js/reviews.js', array( 'jquery'), '20160929', true );
        }
        
	wp_enqueue_script( 'mejorcamara-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery'), '20151215', true );
        wp_localize_script( 'mejorcamara-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'mejorcamara' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'mejorcamara' ) . '</span>',
	) );
        
	wp_enqueue_script( 'mejorcamara-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

        wp_enqueue_script( 'mejorcamara-googlefonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:300,300i,700' );
        
        wp_enqueue_script( 'mejorcamara-fontawesome', 'https://use.fontawesome.com/6029a44e9e.js' );
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
        //Ads custom style to the Homepage
        //if (is_page_template('homepage.php')) {
          //  wp_enqueue_style( 'reviewerscores-overview-style' , get_template_directory_uri() . '/template-parts/homepage.css');            
        //}
}
add_action( 'wp_enqueue_scripts', 'mejorcamara_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
