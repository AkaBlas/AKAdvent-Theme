<?php
/**
 * The template for displaying calendar result pages 
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */
$category = get_category_by_slug( $args['category'] )->term_id;
?>

<div class="list list-<?php echo $args['category']; ?>">
	<div class="intro">
		<img src="<?php echo get_template_directory_uri().'/assets/weihnachtsloewe.png'; ?>"
				alt="<?php esc_html_e( 'Weihnachtlicher Löwe mit einigen Geschenken', 'akadvent' ); ?>">
		<h3 class="inner-text"><?php echo category_description( $category ); ?></h3>
	</div>
	
	<?php
	// Load posts loop.
	$post_list = get_posts( array(
		'order'      => 'asc',
		'category'   => $category,
		'nopaging'   => true
	) );
	
	$check_dates = array();
	for ($i = 1; $i <= 24; $i++) {
		$check_dates[$i] = false;
	}
	if ( $post_list ) {
        foreach ( $post_list as $post ) : 
			$post_tag = get_the_date ( 'j' );
			if ( $post_tag <= 24 ) {
				if ( $check_dates[$post_tag] ) {
					continue;
				} else {
					$check_dates[$post_tag] = true;
				}
			}
			get_template_part( 'template-parts/calendar-post' );
        endforeach;
        wp_reset_postdata();
    }
	for ($i = 1; $i <= 24; $i++) {
		if ( !$check_dates[$i] ) {
			$args = array( 'number' => $i );
			get_template_part( 'template-parts/calendar-placeholder', 'placeholder', $args );
		}
	}
	?>
</div>