<?php
/**
 * The Template for displaying Archive IGCSE pages.
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

		?>
		<div class="hero" style="background-image: url('<?php /* echo esc_url( get_template_directory_uri() . '/assets/images/course-bg.jpg' ); */ ?>')">
			<div class="overlay"></div> <!-- Overlay -->
			<div class="container">
				<div class="row">
					<div class="col-lg-7 title-side">
						<h1 class="page-title">
							All Courses
						</h1>
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
	// 404.
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // End of the loop.

?>

<section id="contact" class="contact-section">
	<div class="contact-section-form-holder">
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
