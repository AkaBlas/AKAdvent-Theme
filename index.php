<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header>
<?php endif;

// Support only static pages
if(current_user_can('administrator')) {
?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php esc_html_e( 'Hinweis an Administratoren', 'akadvent' ); ?></h1>
	</header>
	<p><?php printf( __( 'Es wird nur der Modus einer statischen Startseite unterstützt. Dieser Modus lässt sich im <a href="%s">Customizer unter Homepage-Einstellungen</a> einstellen.', 'akadvent' ), 
				admin_url( '/customize.php?autofocus[section]=static_front_page' )); ?></p>
	<p><?php printf( __( 'Sollte diese Option nicht zur Verfügung stehen, kann es sein, dass erst eine leere <a href="%s">Seite</a>, die die Startseite repräsentieren soll, angelegt werden muss.', 'akadvent' ), 
				admin_url( '/post-new.php?post_type=page' )); ?></p>
<?php
} else {
?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php esc_html_e( 'Willkommen!', 'akadvent' ); ?></h1>
	</header>
	<p><?php esc_html_e( 'Melde dich als Administrator an, um durchzustarten.', 'akadvent' ); ?></p>
	<p><a href="<?php echo admin_url(); ?>" class="button">
		<?php printf(
			esc_html__( '%s Anmelden', 'akadvent' ),
			get_icon_svg( 'ui', 'arrow_right' )
		); ?>
	</a></p>
<?php
}
	
get_footer();
