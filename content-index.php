<?php
/**
 * The template for displaying content in the index.php template.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( is_sticky() ? 'col-lg-6 col-xl-8' : 'col-sm-6 col-lg-4 ' ); ?>>
	<div class="card mb-4">
		<div class="card-header">

				<div class="tags">
					<?php
					// Get the terms for the custom taxonomy associated with the post
					$terms = get_the_terms(get_the_ID(), 'course_category');

					if (!empty($terms) && !is_wp_error($terms)) {
						foreach ($terms as $term) {
							// Get the category color from the custom field
							$category_colour = get_field('category_colour', $term);

							// Default color if no custom field is set
							$color = $category_colour ? esc_attr($category_colour) : '#000000'; // Use black as default if no color is set

							// Output the term name and apply the background color
							echo '<span class="course-category-pin" style="background-color: ' . $color . ';">' . esc_html($term->name) . '</span>';

							// Only show the first term; if you want to display multiple terms, remove the `break;`
							break;
						}
					}

					$tags = get_the_tags();

					// Check if the post is sticky
					$is_sticky = is_sticky();

					if ($tags) {
						foreach ($tags as $tag) {
							// Sanitize the tag name
							$tag_name = esc_html($tag->name);
							$class = '';
							$icon = '';

							// Determine the class and icon based on the tag
							switch ($tag_name) {
								case 'Most Popular':
									$class = 'most-popular';
									$icon = '<i class="fa-solid fa-trophy"></i>';
									break;
								case 'Recorded':
									$class = 'recorded';
									$icon = '<i class="fa-solid fa-microphone"></i>';
									break;
								case 'Live':
									$class = 'live';
									$icon = '<i class="fa-solid fa-broadcast-tower"></i>';
									break;
								default:
									$class = '';
									$icon = '';
									break;
							}

							// Output the tag with the appropriate class and icon
							echo '<span class="tag ' . esc_attr($class) . '">' . $icon . ' ' . $tag_name . '</span>';
						}
					}

					// Add a "Sticky" tag if the post is sticky
					if ($is_sticky) {
						echo '<span class="tag sticky">
								<i class="fa-solid fa-thumbtack"></i> ' . esc_html__('Featured Post', 'cambridge-igcse-tuition') . '
							</span>';
					}
					?>
				</div>
		</div>
		<header class="card-body">
			<h3 class="card-title">
				<?php 
				// Fetch the terms associated with the current post
				$terms = get_the_terms( get_the_ID(), 'course_category' ); // Replace 'course_category' with your actual taxonomy slug
				if ( $terms && ! is_wp_error( $terms ) ) :
					$term = $terms[0]; // Get the first term
					$category_colour = get_field( 'category_colour', 'course_category_' . $term->term_id ); // Fetch color using term ID
					$color = $category_colour ? esc_attr( $category_colour ) : '#000000'; // Default to black if no color is set
				?>
					<span class="course-colour" style="color: <?php echo $color; ?>;">&bull;</span>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'cambridge-igcse-tuition' ), the_title_attribute( array( 'echo' => false ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="card-text entry-meta">
					<?php
					cambridge_igcse_tuition_article_posted_on();

					$num_comments = get_comments_number();
					if ( comments_open() && $num_comments >= 1 ) :
						echo ' <a href="' . esc_url( get_comments_link() ) . '" class="badge badge-pill bg-secondary float-end" title="' . esc_attr( sprintf( _n( '%s Comment', '%s Comments', $num_comments, 'cambridge-igcse-tuition' ), $num_comments ) ) . '">' . $num_comments . '</a>';
					endif;
					?>
				</div><!-- /.entry-meta -->
			<?php endif; ?>
		</header>

		<div class="card-footer">
			<div class="dates">
				<?php 
				$start_date = get_field('course_start_date');
				$end_date = get_field('course_end_date');

				if ( $start_date && $end_date ) {
					?>
					<span><i class="fa-solid fa-calendar"></i><?php echo esc_html( $start_date ); ?> - <?php echo esc_html( $end_date ); ?></span>
					<?php
				}
				?>
			</div>
			<div class="card-text entry-content d-none">
				<?php
					if ( is_search() ) {
						the_excerpt();
					}
				?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'cambridge-igcse-tuition' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- /.card-text -->
			<footer class="entry-meta">
				<a href="<?php the_permalink(); ?>" class="btn cta">
					<?php
					if ( get_post_type() === 'post' ) {
						esc_html_e( 'Read Post', 'cambridge-igcse-tuition' );
					} elseif ( get_post_type() === 'igcse' ) {
						esc_html_e( 'Access Course', 'cambridge-igcse-tuition' );
					} else {
						esc_html_e( 'View Details', 'cambridge-igcse-tuition' ); // Default fallback
					}
					?>
				</a>
			</footer><!-- /.entry-meta -->
		</div><!-- /.card-body -->
	</div><!-- /.col -->
</article><!-- /#post-<?php the_ID(); ?> -->
