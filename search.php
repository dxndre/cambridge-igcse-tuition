<?php
/**
 * The Template for displaying Search Results pages.
 */

get_header();

if ( have_posts() ) :
?>  
    <header class="page-header">
    <div class="hero" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-archive-bg-2.jpg' ); ?>')">
            <div class="overlay"></div> <!-- Overlay -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="title-section">
                            <h1 class="page-title">
                                <?php 
                                $search_query = get_search_query();
                                if ( empty( $search_query ) ) {
                                    esc_html_e( 'All Courses', 'cambridge-igcse-tuition' );
                                } else {
                                    printf( esc_html__( 'Search Results for: %s', 'cambridge-igcse-tuition' ), esc_html( $search_query ) );
                                }
                                ?>
                            </h1>
                        </div>
                    </div>
                    
                    <div class="col-lg-5">
                    <section class="search-section">
                        <h3><i class="fa-solid fa-magnifying-glass"></i>Search for Courses</h3>
                        <?php echo do_shortcode( '[searchandfilter fields="search,course_category" types=",select" submit_label="Search Courses"]' ); ?>
                    </section>
                    </div>              
                </div>      
            </div>
        </div>
    </header>
<?php
    get_template_part( 'archive', 'loop' );
else :
?>
    <article id="post-0" class="post no-results not-found">
        <header class="page-header">
        <div class="hero" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-archive-bg-2.jpg' ); ?>')">
            <div class="overlay"></div> <!-- Overlay -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="title-section">
                                <div class="title-section-inner">
                                    <h1 class="page-title">
                                    <?php 
                                        $search_query = get_search_query();
                                        if ( empty( $search_query ) ) {
                                            esc_html_e( 'All Courses', 'cambridge-igcse-tuition' );
                                        } else {
                                            printf( esc_html__( 'Search Results for: %s', 'cambridge-igcse-tuition' ), esc_html( $search_query ) );
                                        }
                                        ?>
                                    </h1>
                                    <h2><?php esc_html_e( 'Nothing Found', 'cambridge-igcse-tuition' ); ?></h2>
                                    <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cambridge-igcse-tuition' ); ?></p>
                                    <?php
                                        get_search_form();
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="col-lg-5">
                            <section class="search-section">
                                <?php
                                // Get the search query
                                $search_query = get_search_query();
                                
                                // Initialize variables
                                $header_text = "Search for Courses"; // Default header text
                                $shortcode = '[searchandfilter fields="search,course_category" types=",select" submit_label="Search Courses"]'; // Default shortcode
                                
                                // Check if the search query is for 'igcse' or 'testimonial' post types
                                if ( !empty($search_query) ) {
                                    // Perform a new WP_Query to check the post type for the search query
                                    $args = array(
                                        's' => $search_query,
                                        'post_type' => array('igcse', 'testimonial', 'post'), // Include all relevant post types for the check
                                        'posts_per_page' => 1, // Limit to one post for efficiency
                                    );
                                    $query = new WP_Query( $args );

                                    if ( $query->have_posts() ) {
                                        // Loop through the results to check post types
                                        while ( $query->have_posts() ) {
                                            $query->the_post();
                                            $post_type = get_post_type();
                                            // Check the post type
                                            if ( $post_type === 'igcse' ) {
                                                $header_text = "Search for Courses"; // For igcse post type
                                                $shortcode = '[searchandfilter fields="search,course_category" types=",select" submit_label="Search Courses"]'; // Igcse shortcode
                                            } elseif ( $post_type === 'testimonial' ) {
                                                $header_text = "Search posts"; // For testimonial post type
                                                $shortcode = '[searchandfilter fields="search,article" types="post,category" taxonomy="category" taxonomy_terms="article"]'; // Standard post shortcode
                                            } else {
                                                $header_text = "Search posts"; // For standard posts
                                                $shortcode = '[searchandfilter fields="search,article" types="post,category" taxonomy="category" taxonomy_terms="article"]'; // Standard post shortcode
                                            }
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                }
                                ?>
                                <h3><i class="fa-solid fa-magnifying-glass"></i><?php echo esc_html($header_text); ?></h3>
                                <?php echo do_shortcode($shortcode); ?>
                            </section>
                        </div>              
                    </div>      
                </div>
            </div>
        </header>
    </article><!-- /#post-0 -->
<?php
endif;
wp_reset_postdata();
?>

<section id="contact" class="contact-section">
    <div class="contact-section-form-holder results" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-archive-bg-3.png' ); ?>')">
        <div class="backdrop">
            <div class="container">
                <div class="content">
                    <h3>Leave a message</h3>
                    <?php
                        echo do_shortcode('[contact-form-7 id="f64b68e" title="Leave a message"]');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
