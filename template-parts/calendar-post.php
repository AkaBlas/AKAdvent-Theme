<?php
/**
 * Template part for displaying advent calendar posts in archive
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */
 
$number = get_the_date( 'j');
?>
<a href="<?php echo esc_url( get_permalink() ); ?>" id="post-<?php the_ID(); ?>" <?php post_class('tuer-'. $number); ?>>
	<img src="<?php echo get_template_directory_uri().'/assets/tuerchen.png'; ?>" alt="<?php printf ( esc_html__( 'Tür %s', 'akadvent' ), $number ); ?>">
	<div>
		<strong><?php echo get_the_date( 'j. F' ); ?></strong>
		<span>
		<?php 
			$authors = esc_html( get_the_author() );
			if ( strlen ( $authors ) > 28 ) {
				echo substr( $authors, 0, 26 ) . "...";
			} else {
				echo $authors;
			}
		?>
		</span>
	</div>
</a>