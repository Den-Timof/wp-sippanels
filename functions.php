<?php
/**
 * sippanels functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sippanels
 */

if ( ! function_exists( 'sippanels_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sippanels_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sippanels, use a find and replace
		 * to change 'sippanels' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sippanels', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'sippanels' ),
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
		add_theme_support( 'custom-background', apply_filters( 'sippanels_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sippanels_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sippanels_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sippanels_content_width', 640 );
}
add_action( 'after_setup_theme', 'sippanels_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sippanels_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sippanels' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sippanels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sippanels_widgets_init' );


// Deregister Contact Form 7 CSS style sheet
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}






/**
 * Enqueue scripts and styles.
 */
function sippanels_scripts() {

	// wp_enqueue_style( 'font-awesome-css', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );
	
	wp_enqueue_style( 'libs-css', get_template_directory_uri() . '/assets/css/libs.min.css' );

	// wp_enqueue_style( 'bootstrap-multiselect-master-css', get_template_directory_uri() . '/assets/plugins/bootstrap-multiselect-master/bootstrap-multiselect.css' );

	// Style css
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/assets/css/style.min.css' );

	// wp_enqueue_style( 'style2-css', get_template_directory_uri() . '/assets/css/style2.css' );

	// wp_enqueue_style( 'sippanels-style', get_stylesheet_uri() );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/plugins/jquery.stellar/libs/jquery/jquery-1.9.1.js', array(), '20151215', true );
	
	wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', array(), '20151215', true );
	
	// wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bootstrap-multiselect-master-js', get_template_directory_uri() . '/assets/plugins/bootstrap-multiselect-master/bootstrap-multiselect.js', array(), '20151215', true );
	
	// wp_enqueue_script( 'plugin-scrollIt-js', get_template_directory_uri() . '/assets/plugins/scrollIt.js-master/scrollIt.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'plugin-stellar-js', get_template_directory_uri() . '/assets/plugins/jquery.stellar/jquery.stellar.js', array(), '20151215', true );
	
	wp_enqueue_script( 'plugin-wow-js', get_template_directory_uri() . '/assets/plugins/wow/dist/wow.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'plugin-lavalamp-js', get_template_directory_uri() . '/assets/plugins/lavalamp/jquery.lavalamp.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'api-yandex-maps-2.1', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array(), '20151215', true );

	// Init js
	wp_enqueue_script( 'init-js', get_template_directory_uri() . '/assets/js/init.min.js', array(), '20151215', true );

	wp_enqueue_script( 'sippanels-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sippanels-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sippanels_scripts' );




## Отключаем Emojis в WordPress
if(1){
	## отключаем DNS prefetch
	add_filter('emoji_svg_url', '__return_empty_string');

	/**
	 * Disable the emoji's
	 */
	add_action( 'init', 'disable_emojis' );
	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 *
	 * @param    array  $plugins
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
}








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

/**
 * Carbon fields
 */
require get_template_directory() . '/inc/carbon-fields-settings.php';
