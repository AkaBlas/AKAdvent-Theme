<?php
/**
 * Displays the site header.
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */
?>

<header id="masthead" class="site-header" role="banner">

	<div class="inner">
	
	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php else : ?>
		<div class="site-logo">
			<img src="<?php echo get_template_directory_uri().'/assets/logo.png'; ?>" alt="Logo" width="100" height="100">
		</div>
	<?php endif; ?>
	
	<div class="site-branding">

		<?php $blog_info = get_bloginfo( 'name' );
		if ( $blog_info ) : ?>
			<?php if ( is_front_page() && ! is_paged() ) : ?>
				<h1 class="site-title"><?php echo esc_html( $blog_info ); ?></h1>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
			<?php endif; ?>
		<?php endif; ?>

		<?php $description = get_bloginfo( 'description', 'display' );
		if ( $description && true ) : ?>
			<p class="site-description">
				<?php echo $description; ?>
			</p>
		<?php endif; ?>
	</div><!-- .site-branding -->
	
	
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Hauptmenü', 'akadvent' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_class'      => 'menu-wrapper',
					'container_class' => 'primary-menu-container',
					'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
					'depth'           => 1,
					'fallback_cb'     => false,
				)
			);
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>

	</div>

</header><!-- #masthead site-header -->
