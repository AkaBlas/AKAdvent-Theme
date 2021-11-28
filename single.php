<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content-single' );

	the_post_navigation(
		array(
			'next_text' => sprintf(
				'<p class="meta-nav">%s %s</p><p class="post-title">%s</p>',
					esc_html__( 'Nächster Post', 'akadvent' ),
					get_icon_svg( 'ui', 'arrow_right' ),
					'%title'
			),
			'prev_text' => sprintf(
				'<p class="meta-nav">%s %s</p><p class="post-title">%s</p>',
					get_icon_svg( 'ui', 'arrow_left' ),
					esc_html__( 'Vorheriger Post', 'akadvent' ),
					'%title'
			)
		)
	);

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
