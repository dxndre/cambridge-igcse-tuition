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
							if ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'cambridge-igcse-tuition' ), get_the_date() );
							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'cambridge-igcse-tuition' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'cambridge-igcse-tuition' ) ) );
							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'cambridge-igcse-tuition' ), get_the_date( _x( 'Y', 'yearly archives date format', 'cambridge-igcse-tuition' ) ) );
							else :
								esc_html_e( '', 'cambridge-igcse-tuition' );
							endif;

						?>
						</h1>
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

?>

<section id="contact" class="contact-section">
	<div class="contact-section-form-holder" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-archive-bg-3.png' ); ?>')">
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
