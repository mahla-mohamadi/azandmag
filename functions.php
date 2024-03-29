<?php
/**
 * azandmag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package azandmag
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function azandmag_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on azandmag, use a find and replace
		* to change 'azandmag' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'azandmag', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'azandmag' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'azandmag_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'azandmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function azandmag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'azandmag_content_width', 640 );
}
add_action( 'after_setup_theme', 'azandmag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function azandmag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'azandmag' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'azandmag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'azandmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function azandmag_scripts() {
	wp_enqueue_style( 'azandmag-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'azandmag-style', 'rtl', 'replace' );
	wp_enqueue_style( 'additional-style', get_template_directory_uri().'/additional.css', array(), _S_VERSION );
	wp_enqueue_style( 'swiper-style', get_template_directory_uri(). '/swiper/swiper-bundle.min.css' , array(), _S_VERSION );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'azandmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/swiper/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'azandswiper', get_template_directory_uri() . '/js/azandsw.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'azandmag-headersControl', get_template_directory_uri() . '/js/headersControl.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'azandmag-home', get_template_directory_uri() . '/js/home.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'azandmag_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function calculate_reading_time() {

    $content = get_post_field('post_content', get_the_ID());

    $word_count = str_word_count($content);

    $reading_speed = 5;

    $reading_time = ceil($word_count / $reading_speed);

    return sprintf(_n('%d', '%d', $reading_time, 'textdomain'), $reading_time);
}
function reading_time_shortcode() {
    return '<span class="reading-time">' . calculate_reading_time() . '</span>';
}
add_shortcode('reading_time', 'reading_time_shortcode');


function increment_post_views() {
    if (is_single()) {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'views', true);
        $views = empty($views) ? 1 : intval($views) + 1;
        update_post_meta($post_id, 'views', $views);
    }
}

add_action('wp_head', 'increment_post_views');
add_filter('wpcf7_autop_or_not', '__return_false');

function my_excerpt_length($length){
	return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

function new_excerpt_more( $more ) {
	return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');



function pagination_bar() {
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1){
		// $current_page = max(1, get_query_var('paged'));
		global $wp_query;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		echo paginate_links(array(
			'base' =>@add_query_arg('paged','%#%'),
			'format' => '/page/%#%',
			'current' => $current,
			'total' => $total_pages,
			'next_text' => '<span class="leftArrow"></span>',
			'prev_text' => '<span class="rightArrow"></span>',
			'mid_size'=>1
		));
	}
}
