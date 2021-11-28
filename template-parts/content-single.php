<?php
/**
 * Template part for displaying posts
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php 
		the_title( '<h1 class="entry-title">', '</h1>' );
		
		if( !!get_the_author ()) {
			printf(
				esc_html__( 'Von: %s', 'akadvent' ),
				get_the_author()
			); 
		} ?>
	</header>

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
