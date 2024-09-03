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
				<h1 class="page-title">
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
					<?php echo term_description(); ?>
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
