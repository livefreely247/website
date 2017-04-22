<?php
/**
* @summary Add any custom functions to your child theme here
*/

// Move footer widgetized area inside footer container
/*--add_action( 'init', 'woo_move_footer_widgets' );
function woo_move_footer_widgets() {
	remove_action( 'woo_footer_top', 'woo_footer_sidebars', 30 );
	add_action( 'woo_footer_inside', 'woo_footer_sidebars', 30 );
}--/
/*-- This will move footer widgets throughout the site by placing where you want to add_action to in the template*/

/*------Widgetizing area---*/
/* Register our sidebars and widgetized areas.
 */



/**
* @author Keith Murphy - nomad @nomadmystics@gmail.com
* @todo All scripts and styles from vendors/custom need to be enqueued here
* Found @ https://developer.wordpress.org/reference/functions/wp_enqueue_script/
* Found @ https://developer.wordpress.org/reference/functions/wp_enqueue_style/
*/ 
//function gpsen_custom_scripts()
//{
//    wp_enqueue_scripts('gpsen-partners-google-maps', 'http://maps.google.com/maps/api/js?key=AIzaSyAx2cypTFsOW1AHcwnBJZh9AqyxycX0VKs&sensor=false');
//}
//add_action('wp_enqueue_scripts', 'gpsen_custom_scripts');
//

/**
* @author Keith Murphy - nomad @nomadmystics@gmail.com
* @summary Registers the footer navigation widget
* @uses WordPress function register_sidebar() - Found @ https://developer.wordpress.org/reference/functions/register_sidebar/
* @uses WordPress action hook - widgets_init - Found @ https://developer.wordpress.org/reference/hooks/widgets_init/
*/

function footer_nav_widgets_init() {

	$args = [
		'name' => 'Footer Quick Links Area',
		'id' => 'footer_nav',
		'before_widget' => '<div id="footerNavigation">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="liteBlueButton">',
		'after_title' => '</h2>',
	];

	/**
	* @summary Builds the definition for a single sidebar and returns the ID.
	* @param array $args
	* @return int $id
	*/

	register_sidebar( $args );

}
add_action( 'widgets_init', 'footer_nav_widgets_init' );


/**
* @author Keith Murphy - nomad @nomadmystics@gmail.com
* @summary Adds theme support on posts for values in $args
* @uses Wordpress function add_post_type_support() - Found @ https://developer.wordpress.org/reference/functions/add_post_type_support/
* @uses Wordpress acotion hook - init - Found @ https://developer.wordpress.org/reference/hooks/init/
*/
function add_page_support() {

	$post_type = 'post';
    $feature = [
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'comments',
        'trackbacks',
        'revisions',
        'custom-fields',
        'page-attributes',
        'post-formats',
    ];

	/**
	* @summary Register support of certain features for a post type.
	* @param string $post_type
	* @param array $feature
	*/

    add_post_type_support( $post_type, $feature );
}
add_action( 'init', 'add_page_support' );
