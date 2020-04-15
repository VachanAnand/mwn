<?php
/**
 *Wild Safari Lite About Theme
 *
 * @package Wild Safari Lite
 */

//about theme info
add_action( 'admin_menu', 'wild_safari_lite_abouttheme' );
function wild_safari_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'wild-safari-lite'), __('About Theme Info', 'wild-safari-lite'), 'edit_theme_options', 'wild_safari_lite_guide', 'wild_safari_lite_mostrar_guide');   
} 

//Info of the theme
function wild_safari_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'wild-safari-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Wild Safari Lite is a elegant and refined, minimal and sophisticated, stylish and gracious, feature-rich and intuitively navigable, gorgeous and seamless, modern, polished, and professionally designed animal and pets WordPress theme. Its a very unique and purposeful theme, dedicated to pet care centers, pet stores, animal lovers, dog lovers blog and all pet related business. ','wild-safari-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'wild-safari-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'wild-safari-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'wild-safari-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'wild-safari-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'wild-safari-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'wild-safari-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'wild-safari-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'wild-safari-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'wild-safari-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( WILD_SAFARI_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'wild-safari-lite'); ?></a> | 
            <a href="<?php echo esc_url( WILD_SAFARI_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'wild-safari-lite'); ?></a> | 
            <a href="<?php echo esc_url( WILD_SAFARI_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'wild-safari-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>