<?php
/**
 * Template Name: Search Posts Only
 */

get_header();
?>

<main id="primary" class="site-main">

<?php
// Define custom query for searching posts only
if ( have_posts() ) : 

    $args = array(
        'post_type' => 'post', // Only return posts
        's' => get_search_query(), // Use the current search query
    );

    $query = new WP_Query($args);

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            get_template_part( 'template-parts/content', 'search' ); // Adjust this to match your search loop
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;

    wp_reset_postdata(); // Reset after custom query

endif;
?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
