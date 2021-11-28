<?php
/**
 * Template part for displaying posts
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
		the_content(
			akadvent_continue_reading_text()
		);

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
