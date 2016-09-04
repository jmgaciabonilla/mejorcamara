<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mejorcamara
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-info">
                <div class="footer-branding">
                    
                    <a title="inicio" href="https://mejorcamara.com/"><img class="logo-footer" src="<?php echo get_template_directory_uri(); ?>/images/mejorcamera-logo-footer.png" alt="Logo" /></a>
                    <p>&COPY; mejorcamara.com 2016</p>
                </div>
                    <a id="privacidad" class="condiciones-privacidad" title="condiciones y privacidad" href="https://mejorcamara.com/condiciones-y-privacidad">Condiciones y privacidad</a>
                </div>
			
                <?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
                                                 wp_nav_menu(
                                                    array(
                                                        'theme_location'  => 'social',
                                                        'container'       => 'div',
                                                        'container_id'    => 'menu-social',
                                                        'container_class' => 'menu',
                                                        'menu_id'         => 'menu-social-items',
                                                        'menu_class'      => 'menu-items',
                                                        'depth'           => 1,
                                                        'link_before'     => '<span class="screen-reader-text">',
                                                        'link_after'      => '</span>',
                                                        'fallback_cb'     => '',
                                                    )
                                                 );                        
					?>
                                    
				</nav><!-- .social-navigation -->
                <?php endif; ?>
            
            
            
            
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
