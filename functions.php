<?php        
/**
 * Wild Safari Lite functions and definitions
 *
 * @package Wild Safari Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'wild_safari_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function wild_safari_lite_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 680; /* pixels */
    }	

	load_theme_textdomain( 'wild-safari-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-height' => true,
	) );	
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wild-safari-lite' ),
		'footer' => __( 'Footer Menu', 'wild-safari-lite' ),						
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // wild_safari_lite_setup
add_action( 'after_setup_theme', 'wild_safari_lite_setup' );
function wild_safari_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'wild-safari-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'wild-safari-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'wild_safari_lite_widgets_init' );


function wild_safari_lite_font_url(){
		$font_url = '';	
		
		/* Translators: If there are any character that are not
		* supported by Showcard Gothic, trsnalate this to off, do not
		* translate into your own language.
		*/
		$showcardgothic = _x('on','Showcard Gothic:on or off','wild-safari-lite');
		
		/* Translators: If there are any character that are not
		* supported by Assistant, trsnalate this to off, do not
		* translate into your own language.
		*/
		$assistant = _x('on','Assistant:on or off','wild-safari-lite');		
		
		/* Translators: If there are any character that are not
		* supported by Open Sans, trsnalate this to off, do not
		* translate into your own language.
		*/
		$opensans = _x('on','Open Sans:on or off','wild-safari-lite');	
		
		    if('off' !== $opensans || 'off' !== $assistant || 'off' !== $showcardgothic ){
			    $font_family = array();
			
			if('off' !== $assistant){
				$font_family[] = 'Assistant:300,400,600';
			}
			
			if('off' !== $opensans){
				$font_family[] = 'Open Sans:300,400,600,800';
			}
			
			if('off' !== $showcardgothic){
				$font_family[] = 'Showcard Gothic:300,400,600,900';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function wild_safari_lite_scripts() {
	wp_enqueue_style('wild-safari-lite-font', wild_safari_lite_font_url(), array());
	wp_enqueue_style( 'wild-safari-lite-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'wild-safari-lite-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'wild-safari-lite-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wild_safari_lite_scripts' );

function wild_safari_lite_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('wild-safari-lite-ie', get_template_directory_uri().'/css/ie.css', array( 'wild-safari-lite-style' ), '20160928' );
	wp_style_add_data('wild-safari-lite-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'wild-safari-lite-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'wild-safari-lite-style' ), '20160928' );
	wp_style_add_data( 'wild-safari-lite-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'wild-safari-lite-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'wild-safari-lite-style' ), '20160928' );
	wp_style_add_data( 'wild-safari-lite-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','wild_safari_lite_ie_stylesheet');

define('WILD_SAFARI_LITE_THEME_DOC','https://gracethemes.com/documentation/wild-safari-doc/#homepage-lite','wild-safari-lite');
define('WILD_SAFARI_LITE_PROTHEME_URL','https://gracethemes.com/themes/animal-pets-wordpress-theme/','wild-safari-lite');
define('WILD_SAFARI_LITE_LIVE_DEMO','https://www.gracethemes.com/demo/wild-safari/','wild-safari-lite');

if ( ! function_exists( 'wild_safari_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function wild_safari_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

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