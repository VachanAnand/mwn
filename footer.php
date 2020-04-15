<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wild Safari Lite
 */
$wild_safari_lite_show_socialicons 	  	= get_theme_mod('wild_safari_lite_show_socialicons', false);
?>

<div class="footer-wrapper"> 
   <div class="container footer"> 
         <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h2>            
         <?php wp_nav_menu( array('theme_location' => 'footer') ); ?>
   
         <?php if( $wild_safari_lite_show_socialicons != ''){ ?> 
                   <div class="social-icons">                                                
                   <?php $wild_safari_lite_fb_link = get_theme_mod('wild_safari_lite_fb_link');
                    if( !empty($wild_safari_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($wild_safari_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $wild_safari_lite_twitt_link = get_theme_mod('wild_safari_lite_twitt_link');
                    if( !empty($wild_safari_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($wild_safari_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $wild_safari_lite_gplus_link = get_theme_mod('wild_safari_lite_gplus_link');
                    if( !empty($wild_safari_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($wild_safari_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $wild_safari_lite_linked_link = get_theme_mod('wild_safari_lite_linked_link');
                    if( !empty($wild_safari_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($wild_safari_lite_linked_link); ?>"></a>
                  <?php } ?>                  
               </div><!--end .social-icons--> 
        <?php } ?>
   
      </div>

        <div class="footer-copyright"> 
            <div class="container">            	
                <div class="design-by">
				  <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'wild-safari-lite');?>  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-animal-pets-wordpress-theme/', 'wild-safari-lite' ) ); ?>" target="_blank"><?php printf( __( 'Theme by %s', 'wild-safari-lite' ), 'Grace Themes' ); ?></a>
                </div>
             </div><!--end .container-->             
        </div><!--end .footer-copyright-->  
                     
     </div><!--end #footer-wrapper-->
</div><!--#end sitelayout_type-->

<?php wp_footer(); ?>
</body>
</html>