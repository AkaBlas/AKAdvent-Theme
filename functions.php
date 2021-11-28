<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AKAdvent
 * @since AKAdvent 1.0
 */ 
 
if ( ! function_exists( 'akadvent_after_setup_theme' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since AKAdvent 1.0
	 *
	 * @return void
	 */
	function akadvent_after_setup_theme() {
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Hauptmenü', 'akadvent' ),
				'footer'  => __( 'Footermenü', 'akadvent' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5'
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'               => 100,
				'width'                => 100,
				'flex-width'           => true,
				'flex-height'          => false,
				'unlink-homepage-logo' => true,
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'fff',
			)
		);
	}
}
add_action( 'after_setup_theme', 'akadvent_after_setup_theme' );

/**
 * Enqueue scripts and styles.
 *
 * @since AKAdvent 1.0
 *
 * @return void
 */
function akadvent_scripts() {
	wp_enqueue_style( 'akadvent-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	
	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'akadvent_scripts' );

/**
 * Remove rss feeds
 * // TODO: OPTIMIZE
 *
 * @since AKAdvent 1.0
 *
 * @return void
 */
function akadvent_disable_feed() {
 wp_die( __( 'Leider kann ich dir keinen Feed anbieten :/' ) );
}
add_action('do_feed', 'akadvent_disable_feed', 1);
add_action('do_feed_rdf', 'akadvent_disable_feed', 1);
add_action('do_feed_rss', 'akadvent_disable_feed', 1);
add_action('do_feed_rss2', 'akadvent_disable_feed', 1);
add_action('do_feed_atom', 'akadvent_disable_feed', 1);
add_action('do_feed_rss2_comments', 'akadvent_disable_feed', 1);
add_action('do_feed_atom_comments', 'akadvent_disable_feed', 1);

/**
 * Changes comment form default fields.
 *
 * @since AKAdvent 1.0
 *
 * @param array $defaults The form defaults.
 * @return array
 */
function akadvent_comment_form_defaults( $defaults ) {

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $defaults['comment_field'] );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'akadvent_comment_form_defaults' );

/**
 * Creates continue reading text.
 *
 * @since AKAdvent 1.0
 */
function akadvent_continue_reading_text() {
	$continue_reading = sprintf(
		/* translators: %s: Name of current post. */
		esc_html__( 'Weiterlesen %s', 'akadvent' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	);

	return $continue_reading;
}

/**
 * Creates the continue reading link for excerpt.
 *
 * @since AKAdvent 1.0
 */
function akadvent_continue_reading_link_excerpt() {
	if ( ! is_admin() ) {
		return '&hellip; <a class="more-link" href="' . esc_url( get_permalink() ) . '">' . akadvent_continue_reading_text() . '</a>';
	}
}
// Filter the excerpt more link.
add_filter( 'excerpt_more', 'akadvent_continue_reading_link_excerpt' );

/**
 * Creates the continue reading link.
 *
 * @since AKAdvent 1.0
 */
function akadvent_continue_reading_link() {
	if ( ! is_admin() ) {
		return '<div class="more-link-container"><a class="more-link" href="' . esc_url( get_permalink() ) . '#more-' . esc_attr( get_the_ID() ) . '">' . akadvent_continue_reading_text() . '</a></div>';
	}
}
// Filter the excerpt more link.
add_filter( 'the_content_more_link', 'akadvent_continue_reading_link' );


if ( ! function_exists( 'akadvent_wp_title' ) ) {
	/**
	 * Customize the page title.
	 *
	 * @since AKAdvent 1.0
	 *
	 * @param string $title The original title.
	 * @return string The title to use.
	 */
	function akadvent_wp_title( $title ) {
		$pageTitle = get_bloginfo( 'title' ) . ' ' . get_bloginfo( 'description' );
		
		// If there's a post type archive.
		if ( is_404() || is_search() || is_archive() || is_category() || is_tag() || is_attachment() ) {
			$title = __( 'Neugierig? Hab Geduld!', 'akadvent' ) . ' &#8211; ';
		}
		
		return $title !== '' ? $title . $pageTitle : $pageTitle;
	}
}
add_filter( 'wp_title', 'akadvent_wp_title' );

if ( ! function_exists( 'akadvent_comment_form_default_fields' ) ) {
	/**
	 * Remove url field from comment form.
	 *
	 * @since AKAdvent 1.0
	 */
	function akadvent_comment_form_default_fields ( $fields ) {
		if(isset($fields['url'])) {
			unset($fields['url']);
			return $fields;
		}
	}
}
add_filter( 'comment_form_default_fields', 'akadvent_comment_form_default_fields' );

/**
 * Gets the SVG code for a given icon.
 *
 * @since AKAdvent 1.0
 *
 * @param string $group The icon group.
 * @param string $icon  The icon.
 * @param int    $size  The icon size in pixels.
 * @return string
 */
function get_icon_svg( $group, $icon, $size = 24 ) {
	/**
	 * Place each <svg> source on its own array key, without adding either
	 * the `width` or `height` attributes, since these are added dynamically,
	 * before rendering the SVG code.
	 *
	 * All icons are assumed to have equal width and height, hence the option
	 * to only specify a `$size` parameter in the svg methods.
	 */
	if ( 'ui' === $group ) {
		/**
		 * User Interface icons – svg sources.
		 *
		 * @since AKAdvent 1.0
		 *
		 * @var array
		 */
		$arr = array(
			'arrow_right' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="m4 13v-2h12l-4-4 1-2 7 7-7 7-1-2 4-4z" fill="currentColor"/></svg>',
			'arrow_left'  => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 13v-2H8l4-4-1-2-7 7 7 7 1-2-4-4z" fill="currentColor"/></svg>',
			'close'       => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 10.9394L5.53033 4.46973L4.46967 5.53039L10.9393 12.0001L4.46967 18.4697L5.53033 19.5304L12 13.0607L18.4697 19.5304L19.5303 18.4697L13.0607 12.0001L19.5303 5.53039L18.4697 4.46973L12 10.9394Z" fill="currentColor"/></svg>',
			'menu'        => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 6H19.5V7.5H4.5V6ZM4.5 12H19.5V13.5H4.5V12ZM19.5 18H4.5V19.5H19.5V18Z" fill="currentColor"/></svg>',
			'plus'        => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18 11.2h-5.2V6h-1.6v5.2H6v1.6h5.2V18h1.6v-5.2H18z" fill="currentColor"/></svg>',
			'minus'       => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 11h12v2H6z" fill="currentColor"/></svg>',
		);
	} else {
		$arr = array();
	}

	/**
	 * Filters array of icons.
	 *
	 * The dynamic portion of the hook name, `$group`, refers to
	 * the name of the group of icons, eg. "ui".
	 *
	 * @since AKAdvent 1.0
	 *
	 * @param array $arr Array of icons.
	 */
	$arr = apply_filters( "svg_icons_{$group}", $arr );

	$svg = '';
	if ( array_key_exists( $icon, $arr ) ) {
		$repl = sprintf( '<svg class="svg-icon" width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ', $size, $size );

		$svg = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
	}

	// @phpstan-ignore-next-line.
	return $svg;
}

/**
 * Changes the default navigation arrows to svg icons
 *
 * @since AKAdvent 1.0
 *
 * @param string $calendar_output The generated HTML of the calendar.
 * @return string
 */
function akadvent_change_calendar_nav_arrows( $calendar_output ) {
	$calendar_output = str_replace( '&laquo; ', get_icon_svg( 'ui', 'arrow_left' ), $calendar_output );
	$calendar_output = str_replace( ' &raquo;', get_icon_svg( 'ui', 'arrow_right' ), $calendar_output );
	return $calendar_output;
}
add_filter( 'get_calendar', 'akadvent_change_calendar_nav_arrows' );

/**
 * Retrieve protected post password form content.
 *
 * @since AKAdvent 1.0
 *
 * @param string      $output The password form HTML output.
 * @param int|WP_Post $post   Optional. Post ID or WP_Post object. Default is global $post.
 * @return string HTML content for password form for password protected post.
 */
function akadvent_password_form( $output, $post = 0 ) {
	$post   = get_post( $post );
	$label  = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );
	$output = '<p class="post-password-message">' . esc_html__( 'Dieser Inhalt ist passwortgeschützt. Bitte gib das Passwort ein, um ihn anzusehen', 'akadvent' ) . '</p>
	<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<label class="post-password-form__label" for="' . esc_attr( $label ) . '">' . esc_html_x( 'Passwort', 'Post password form', 'akadvent' ) . '</label><input class="post-password-form__input" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" /><input type="submit" class="post-password-form__submit" name="' . esc_attr_x( 'submit', 'Post password form', 'akadvent' ) . '" value="' . esc_attr_x( 'Formular abschicken', 'Post password form', 'akadvent' ) . '" /></form>
	';
	return $output;
}
add_filter( 'the_password_form', 'akadvent_password_form', 10, 2 );

/**
 * Replace post author with 'guest-author'
 *
 * @since AKAdvent 1.0
 *
 * @param string 	$name Name of the author.
 * @return string Name of the author.
 */
function akadvent_author_name( $name ) {
	global $post;
	$author = get_post_meta( $post->ID, 'guest-author', true );
	return $author;
}
add_filter( 'the_author', 'akadvent_author_name' );
add_filter( 'get_the_author_display_name', 'akadvent_author_name' );

/**
 * Advent calendar shortcode
 *
 * @since AKAdvent 1.0
 */
function akadvent_shortcode_calendar( $atts ) {
    $attributes = shortcode_atts( array(
        'category' => 'uncategorized'
    ), $atts );
     
    ob_start();
    get_template_part( 'template-parts/calendar', 'shortcode_calendar', $attributes );
    return ob_get_clean();
}
add_shortcode( 'calendar', 'akadvent_shortcode_calendar' );

/**
 * Custom login screen
 *
 * @since AKAdvent 1.0
 */
function akadvent_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login.css' );
}
add_action( 'login_enqueue_scripts', 'akadvent_login_stylesheet' );

function akadvent_login_headerurl() {
    return home_url();
}
add_filter( 'login_headerurl', 'akadvent_login_headerurl' );

function akadvent_login_headertitle() {
    return 'AKAdvent';
}
add_filter( 'login_headertitle', 'akadvent_login_headertitle' );