<?php
/**
 * The Template for displaying Archive pages.
 */

get_header();

if ( have_posts() ) :
?>
<header class="page-header">
	<div class="hero-container">
		<?php
			// Retrieve the current taxonomy term
			$term = get_queried_object();

			// Check if the term is valid and fetch the ACF field
			if ($term && isset($term->term_id)) {
				$header_image = get_field('header_image', 'term_' . $term->term_id);
			} else {
				$header_image = null;
			}

			// Determine the background image URL
			$background_image = $header_image ? esc_url($header_image['url']) : 'default-image-url.jpg'; // Replace with your default image URL

		?>
		<div class="hero" style="background-image: url('<?php echo $background_image; ?>'); background-size: cover; background-position: center;">
			<div class="overlay"></div> <!-- Overlay -->
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<h1 class="page-title">
						
						<?php 
						// Get the current taxonomy term object
						$term = get_queried_object(); // Gets the current taxonomy term (e.g., custom taxonomy)

						// Default color if the custom field is not set
						$default_color = '#000000'; // Black color or any default color you prefer

						if ($term && !is_wp_error($term)) {
							// Retrieve the color field for the current taxonomy term
							$category_colour = get_field('category_colour', $term);
							
							// Use the custom color if available, otherwise use the default color
							$color = $category_colour ? esc_attr($category_colour) : $default_color;
						} else {
							// Fallback if term retrieval fails, use the default color
							$color = $default_color;
						}
						?>

						<span class="course-colour" style="color: <?php echo $color; ?>;">&bull;</span>


						<?php
							if ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'cambridge-igcse-tuition' ), get_the_date() );
							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'cambridge-igcse-tuition' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'cambridge-igcse-tuition' ) ) );
							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'cambridge-igcse-tuition' ), get_the_date( _x( 'Y', 'yearly archives date format', 'cambridge-igcse-tuition' ) ) );
							else :
								esc_html_e( '', 'cambridge-igcse-tuition' );
							endif;

							// Display term names
							$terms = get_the_terms( get_the_ID(), 'course_category' );
							if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
								foreach ( $terms as $term ) {
									echo esc_html( $term->name );
								}
							}
						?>
						</h1>
						<div class="course-description">
							<?php 
								// Get the full term description
								$full_description = term_description();
								
								// Use regex to extract the first paragraph
								preg_match('/<p>(.*?)<\/p>/', $full_description, $first_paragraph);

								// Display the first paragraph
								if (isset($first_paragraph[0])) {
									echo $first_paragraph[0];
								}
							?>

							<!-- Hidden section for the full description -->
							<div class="full-description">
								<?php echo $full_description; ?>
							</div>

							<!-- Read More link -->
							<a class="btn btn-secondary cta read-more" href="#">Read more</a>
						</div>
					</div>
					
					<div class="col-lg-5">
					<section class="search-section">
						<h3>Search for Courses</h3>
						<?php echo do_shortcode( '[searchandfilter fields="search,course_category" types=",radio,radio"]' ); ?>
					</section>
					</div>
					
				</div>
				
				
			</div>
		</div>
</header>

<?php
	get_template_part( 'archive', 'loop' );
else :
	// 404.
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // End of the loop.

get_footer();
