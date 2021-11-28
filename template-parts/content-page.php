<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_front_page() ) : ?>
		<header class="entry-header alignwide">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Seite', 'akadvent' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Seite %', 'akadvent' ),
			)
		);
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
