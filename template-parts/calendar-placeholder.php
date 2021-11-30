<?php
/**
 * Template part for displaying advent calendar placeholder in archive
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */
 
$number = $args['number'];
?>
<a class="tuer-<?php echo $number; ?>" disabled>
	<img src="<?php echo get_template_directory_uri().'/assets/tuer' . $number . '.png'; ?>" alt="<?php printf ( esc_html__( 'Tür %s', 'akadvent' ), $number ); ?>">
</a>