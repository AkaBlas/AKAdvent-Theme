<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

get_header();
?>

	<div class="error-404 not-found default-max-width">
		<header class="page-header alignwide">
			<img src="<?php echo get_template_directory_uri().'/assets/weihnachtsloewe.png'; ?>"
			alt="<?php esc_html_e( 'Weihnachtlicher Löwe mit einigen Geschenken', 'akadvent' ); ?>">
			<h1 class="page-title"><?php esc_html_e( 'Neugierig? Hab Geduld!', 'akadvent' ); ?></h1>
		</header>
	
		<div class="page-content">
			<p><?php esc_html_e( 'Du scheinst es kaum erwarten zu können. Aber sei geduldig, es ist noch etwas hin.', 'akadvent' ); ?></p>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">
				<?php printf(
					esc_html__( '%s Zurück zur Übersicht', 'akadvent' ),
					get_icon_svg( 'ui', 'arrow_left' )
				); ?>
			</a></p>
		</div>
	</div><!-- .error-404 -->

<?php
get_footer();
