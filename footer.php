<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<div class="inner">

		<div class="site-info">
			<div class="powered-by">
				<?php
				$theme_data = wp_get_theme();
				printf(
					esc_html__( 'Angetrieben durch %s & %s.', 'akadvent' ),
					'<a href="' . esc_url( __( 'https://wordpress.org/', 'akadvent' ) ) . '" target="_blank" rel="noopener" rel="noreferrer">WordPress</a>',
					'<a href="' . $theme_data->get( 'ThemeURI' ) . '" target="_blank" rel="noopener" rel="noreferrer">' . $theme_data->get( 'Name' ) . '</a>'
				);
				?>
			</div><!-- .powered-by -->

		</div><!-- .site-info -->
		
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footermenü', 'akadvent' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		
		</div>
		
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
