<?php

/**
* Template Name: Events Page Business Template
* @author Keith Murphy - nomad @nomadmystics@gmail.com && WooThemes
* @summary The business page template displays your posts with a "business"-style  content slider at the top. - WooThemes message
* @summary This page builds out the content for the events page by looping through the 'gpsen-events' and 'community-events' categories
*
* @uses WooThemes
*
* @package WooFramework
* @subpackage Template
*/

global $woo_options, $wp_query;

get_header();

$page_template = woo_get_page_template();

?>

<!-- #content Starts -->

<?php woo_content_before(); ?>

<?php
if ((isset($woo_options['woo_slider_biz']) && 'true' == $woo_options['woo_slider_biz']) && (isset($woo_options['woo_slider_biz_full']) && 'true' == $woo_options['woo_slider_biz_full'])) {

    $saved = $wp_query;

    woo_slider_biz(); $wp_query = $saved;

}
?>

<div id="content" class="col-full business">
    <div id="main-sidebar-container" class="eventsPage">

        <!-- #main Starts -->

        <?php woo_main_before(); ?>

        <?php
        if ((isset($woo_options['woo_slider_biz']) && 'true' == $woo_options['woo_slider_biz']) && (isset($woo_options['woo_slider_biz_full']) && 'false' == $woo_options['woo_slider_biz_full'])) {

            $saved = $wp_query;

            woo_slider_biz();

            $wp_query = $saved;

        }
        ?>

        <section id="main">
            <h2 class="greenHeaders">GPSEN Events</h2>

            <?php
            // This is the posts for GPSEN Events category
            woo_loop_before();

            /**
            * @summary array WP_Query arguments
            * @see https://developer.wordpress.org/themes/basics/post-types/
            * @see https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
            * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
            * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
            * @see https://developer.wordpress.org/reference/classes/wp_query/#pagination-parameters
            */
            $GPSEN_args = [
                'post_type' => 'post',
                'category_name' => 'gpsen-events',
                'order'  => 'ASC',
                'orderby' => 'menu_order',
                'posts_per_page' =>  '-1'
            ];

            /**
            * @author Keith Murphy - nomad @nomadmystics@gmail.com
            * @summary Loops through to populate the page content with GPESN event posts
            * @todo Change @query a unique varible
            * @todo Add wp_reset_postdata(); - Found @ standard usage https://developer.wordpress.org/reference/classes/wp_query/#usage
            * @uses WP_Query class - Found @ https://developer.wordpress.org/reference/classes/wp_query/#usage
            *
            * @param array $GPSEN_args
            * @return object $query
            */

            $query = new WP_Query( $GPSEN_args );

            /**
            * @uses The Loop - Found @ https://developer.wordpress.org/themes/basics/the-loop/
            */

            if ( $query->have_posts() ) {

                while ( $query->have_posts() ) {

                    $query->the_post();

                    echo '<div class="entry-content greySections addLiteMarginTop">';
                    echo '<div class="whiteCard">';
                    echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';

                    the_content();

                    echo '</div>';
                    echo '</div>';
                }

            }
            ?>

            <h2 class="greenHeaders">Community Events</h2>

            <?php
            // This is the posts for Community Events category
            woo_loop_before();

            /**
            * @summary array WP_Query arguments
            * @see https://developer.wordpress.org/themes/basics/post-types/
            * @see https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
            * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
            * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
            * @see https://developer.wordpress.org/reference/classes/wp_query/#pagination-parameters
            */

            $community_args = [
                'post_type' => 'post',
                'category_name' => 'community-events',
                'order' => 'ASC',
                'orderby' => 'menu_order',
                'posts_per_page' =>  '-1'
            ];

            /**
            * @author Keith Murphy - nomad @nomadmystics@gmail.com
            * @summary Loops through to populate the page content with community event posts
            * @todo Change @query a unique varible
            * @todo Add wp_reset_postdata(); - Found @ standard usage https://developer.wordpress.org/reference/classes/wp_query/#usage
            * @uses WP_Query class - Found @ https://developer.wordpress.org/reference/classes/wp_query/#usage
            *
            * @param array $community_args
            * @return object $query
            */

            $query = new WP_Query( $community_args );

            /**
            * @uses The Loop - Found @ https://developer.wordpress.org/themes/basics/the-loop/
            */

            if ( $query->have_posts() ) {

                while ( $query->have_posts() ) {

                    $query->the_post();

                    echo '<div class="entry-content greySections addLiteMarginTop">';
                    echo '<div class="whiteCard">';
                    echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';

                    the_content();

                    echo '</div>';
                    echo '</div>';
                }

            }
            ?>

            <div class="accordion addLiteMarginTop">
                <h3 class="accordionHeadersGrey">Classes, Workshops &amp; Conferences</h3>
                <div>

                    <?php
                    /// Starting custom posts
                    // Publications media Opportunities
                    // WP_Query arguments
                    /**
                    * @summary array WP_Query arguments
                    * @see https://developer.wordpress.org/themes/basics/post-types/
                    * @see https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
                    * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
                    * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
                    * @see https://developer.wordpress.org/reference/classes/wp_query/#pagination-parameters
                    */

                    $classes_workshops_args = [
                        'post_type'              => 'post',
                        'category_name'          => 'classes-workshops-and-conferences',
                        'order'                  => 'ASC',
                        'orderby'                => 'menu_order',
                        'posts_per_page'         =>  '-1'
                    ];

                    /**
                    * @author Keith Murphy - nomad @nomadmystics@gmail.com
                    * @summary Loops through to populate the page content with classes and workshop posts
                    * @todo Add wp_reset_postdata(); - Found @ standard usage https://developer.wordpress.org/reference/classes/wp_query/#usage
                    * @uses WP_Query class - Found @ https://developer.wordpress.org/reference/classes/wp_query/#usage
                    *
                    * @param array $classes_workshops_query
                    * @return object $classes_workshops_query
                    */

                    $classes_workshops_query = new WP_Query( $classes_workshops_args );

                    /**
                    * @uses The Loop - Found @ https://developer.wordpress.org/themes/basics/the-loop/
                    */

                    if ( $classes_workshops_query->have_posts() ) {

                        while ( $classes_workshops_query->have_posts() ) {

                            $classes_workshops_query->the_post();

                            echo '<div class="entry-content greySections addLiteMarginTop">';
                            echo '<div class="whiteCard">';
                            echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';

                            the_content();

                            echo '</div>';
                            echo '</div>';

                        }

                    }
                    ?>

                </div>
            </div><!--accordion classes, workshops-->

            <?php
            /**
            * @summary Get the content for the page
            */
            if ( have_posts() ) {

                  $count = 0;

                  while ( have_posts() ) {

                       the_post();

                       $count++;

                       woo_get_template_part( 'content', 'page-template-business' ); // Get the page content template file, contextually.

                  }

            }
            woo_loop_after();
            ?>

        </section><!-- /#main -->

        <?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#main-sidebar-container -->

    <?php get_sidebar( 'alt' ); ?>

</div><!-- /#content -->

<?php woo_content_after(); ?>

<?php get_footer(); ?>
