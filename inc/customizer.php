<?php    
/**
 *Wild Safari Lite Theme Customizer
 *
 * @package Wild Safari Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wild_safari_lite_customize_register( $wp_customize ) {	
	
	function wild_safari_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function wild_safari_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'wild_safari_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'wild-safari-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
		'title' => __('Site Layout','wild-safari-lite'),			
		'priority' => 1,
		'panel' => 	'wild_safari_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
		'sanitize_callback' => 'wild_safari_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	'section'   => 'layout_option',    	 
		'label' => __('Check to Box Layout','wild-safari-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','wild-safari-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('wild_safari_lite_color_scheme',array(
		'default' => '#71b002',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'wild_safari_lite_color_scheme',array(
			'label' => __('Color Scheme','wild-safari-lite'),			
			'description' => __('More color options in PRO Version','wild-safari-lite'),
			'section' => 'colors',
			'settings' => 'wild_safari_lite_color_scheme'
		))
	);	
	
	// Slider Section		
	$wp_customize->add_section( 'wild_safari_lite_slider_options', array(
		'title' => __('Slider Section', 'wild-safari-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 645 pixel.','wild-safari-lite'), 
		'panel' => 	'wild_safari_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('wild_safari_lite_sliderpage1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('wild_safari_lite_sliderpage1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','wild-safari-lite'),
		'section' => 'wild_safari_lite_slider_options'
	));	
	
	$wp_customize->add_setting('wild_safari_lite_sliderpage2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('wild_safari_lite_sliderpage2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','wild-safari-lite'),
		'section' => 'wild_safari_lite_slider_options'
	));	
	
	$wp_customize->add_setting('wild_safari_lite_sliderpage3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('wild_safari_lite_sliderpage3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','wild-safari-lite'),
		'section' => 'wild_safari_lite_slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('wild_safari_lite_slider_readmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('wild_safari_lite_slider_readmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','wild-safari-lite'),
		'section' => 'wild_safari_lite_slider_options',
		'setting' => 'wild_safari_lite_slider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('wild_safari_lite_show_slider',array(
		'default' => false,
		'sanitize_callback' => 'wild_safari_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wild_safari_lite_show_slider', array(
	    'settings' => 'wild_safari_lite_show_slider',
	    'section'   => 'wild_safari_lite_slider_options',
	     'label'     => __('Check To Show This Section','wild-safari-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // Wild Services four Services panel
	$wp_customize->add_section('wild_safari_lite_services_section', array(
		'title' => __('Wild Safari Services Section','wild-safari-lite'),
		'description' => __('Select pages from the dropdown for wild safari services section','wild-safari-lite'),
		'priority' => null,
		'panel' => 	'wild_safari_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('wild_safari_lite_services_pagebx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'wild_safari_lite_services_pagebx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'wild_safari_lite_services_section',
	));		
	
	$wp_customize->add_setting('wild_safari_lite_services_pagebx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'wild_safari_lite_services_pagebx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'wild_safari_lite_services_section',
	));
	
	$wp_customize->add_setting('wild_safari_lite_services_pagebx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'wild_safari_lite_services_pagebx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'wild_safari_lite_services_section',
	));
	
	$wp_customize->add_setting('wild_safari_lite_services_pagebx4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'wild_safari_lite_services_pagebx4',array(
		'type' => 'dropdown-pages',			
		'section' => 'wild_safari_lite_services_section',
	));
	
	
	$wp_customize->add_setting('wild_safari_lite_show_services_section',array(
		'default' => false,
		'sanitize_callback' => 'wild_safari_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wild_safari_lite_show_services_section', array(
	   'settings' => 'wild_safari_lite_show_services_section',
	   'section'   => 'wild_safari_lite_services_section',
	   'label'     => __('Check To Show This Section','wild-safari-lite'),
	   'type'      => 'checkbox'
	 ));//Show services Part	
	 
	 
	 // Wild Safari ZOO section 
	$wp_customize->add_section('wild_safari_lite_secondsection', array(
		'title' => __('Wild Safari ZOO Section','wild-safari-lite'),
		'description' => __('Select Pages from the dropdown for Wild Safari ZOO section','wild-safari-lite'),
		'priority' => null,
		'panel' => 	'wild_safari_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('wild_safari_lite_wildsafaripage',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wild_safari_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'wild_safari_lite_wildsafaripage',array(
		'type' => 'dropdown-pages',			
		'section' => 'wild_safari_lite_secondsection',
	));		
	
	$wp_customize->add_setting('show_wild_safari_lite_wildsafaripage',array(
		'default' => false,
		'sanitize_callback' => 'wild_safari_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_wild_safari_lite_wildsafaripage', array(
	    'settings' => 'show_wild_safari_lite_wildsafaripage',
	    'section'   => 'wild_safari_lite_secondsection',
	    'label'     => __('Check To Show This Section','wild-safari-lite'),
	    'type'      => 'checkbox'
	));//Show Wild Safari ZOO Section 
	 
	 
	  //Footer social icons
	$wp_customize->add_section('wild_safari_lite_social_section',array(
		'title' => __('Footer social icons','wild-safari-lite'),
		'description' => __( 'Add social icons link here to display icons in footer', 'wild-safari-lite' ),			
		'priority' => null,
		'panel' => 	'wild_safari_lite_panel_area', 
	));
	
	$wp_customize->add_setting('wild_safari_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('wild_safari_lite_fb_link',array(
		'label' => __('Add facebook link here','wild-safari-lite'),
		'section' => 'wild_safari_lite_social_section',
		'setting' => 'wild_safari_lite_fb_link'
	));	
	
	$wp_customize->add_setting('wild_safari_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('wild_safari_lite_twitt_link',array(
		'label' => __('Add twitter link here','wild-safari-lite'),
		'section' => 'wild_safari_lite_social_section',
		'setting' => 'wild_safari_lite_twitt_link'
	));
	
	$wp_customize->add_setting('wild_safari_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('wild_safari_lite_gplus_link',array(
		'label' => __('Add google plus link here','wild-safari-lite'),
		'section' => 'wild_safari_lite_social_section',
		'setting' => 'wild_safari_lite_gplus_link'
	));
	
	$wp_customize->add_setting('wild_safari_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('wild_safari_lite_linked_link',array(
		'label' => __('Add linkedin link here','wild-safari-lite'),
		'section' => 'wild_safari_lite_social_section',
		'setting' => 'wild_safari_lite_linked_link'
	));
	
	$wp_customize->add_setting('wild_safari_lite_show_socialicons',array(
		'default' => false,
		'sanitize_callback' => 'wild_safari_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wild_safari_lite_show_socialicons', array(
	   'settings' => 'wild_safari_lite_show_socialicons',
	   'section'   => 'wild_safari_lite_social_section',
	   'label'     => __('Check To show This Section','wild-safari-lite'),
	   'type'      => 'checkbox'
	 ));//Show footer Social icons Section 		 
	
		 
}
add_action( 'customize_register', 'wild_safari_lite_customize_register' );

function wild_safari_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .blog_post_list h2 a:hover,
        #sidebar ul li a:hover,								
        .blog_post_list h3 a:hover,					
        .recent-post h6:hover,					
        .wild_servicesbx:hover .button,									
        .postmeta a:hover,
        .button:hover,
		.seconsec_contentbox h3 span,
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,      
        .wild_servicesbx:hover h3 a,		
        .header-top a:hover,
		.footer-wrapper h2 span,
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a,
        .sitenav ul li a:hover, 
        .sitenav ul li.current-menu-item a,
        .sitenav ul li.current-menu-parent a.parent,
        .sitenav ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('wild_safari_lite_color_scheme','#71b002')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .learnmore,
		.logo, 
		.logo::after, 
		.logo::before,
		.social-icons a:hover,
		.nivo-caption .slide_more,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,       		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('wild_safari_lite_color_scheme','#71b002')); ?>;}	
         	
    </style> 
<?php                     
}
         
add_action('wp_head','wild_safari_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wild_safari_lite_customize_preview_js() {
	wp_enqueue_script( 'wild_safari_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'wild_safari_lite_customize_preview_js' );