<?php
/**
 * The template for displaying content in the index.php template.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-xl-4' ); ?>>
	<div class="card mb-4">
		<div class="card-header">
			<?php
				// Get the terms for the custom taxonomy associated with the post
				$terms = get_the_terms( get_the_ID(), 'course_category' );

				if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
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
			?>
		</div>
		<header class="card-body">
			<h3 class="card-title">
				<?php 
					// Same logic to get and display the color in the course color span
					$term = get_queried_object(); // Gets the current taxonomy term
					$category_colour = get_field('category_colour', $term);
					$color = $category_colour ? esc_attr($category_colour) : '#000000'; // Default color if not set
				?>
				<span class="course-colour" style="color: <?php echo $color; ?>;">&bull;</span>

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
				<a href="<?php the_permalink(); ?>" class="btn cta"><?php esc_html_e( 'Course Detail', 'cambridge-igcse-tuition' ); ?></a>
			</footer><!-- /.entry-meta -->
		</div><!-- /.card-body -->
	</div><!-- /.col -->
</article><!-- /#post-<?php the_ID(); ?> -->
