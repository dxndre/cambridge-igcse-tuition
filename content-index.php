<?php
/**
 * The template for displaying content in the index.php template.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-xl-4' ); ?>>
	<div class="card mb-4">
		<header class="card-body">
			<h3 class="card-title">
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

				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'cambridge-igcse-tuition' ), the_title_attribute( array( 'echo' => false ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>

			<?php
				if ( 'post' === get_post_type() ) :
			?>
				<div class="card-text entry-meta">
					<?php
						cambridge_igcse_tuition_article_posted_on();

						$num_comments = get_comments_number();
						if ( comments_open() && $num_comments >= 1 ) :
							echo ' <a href="' . esc_url( get_comments_link() ) . '" class="badge badge-pill bg-secondary float-end" title="' . esc_attr( sprintf( _n( '%s Comment', '%s Comments', $num_comments, 'cambridge-igcse-tuition' ), $num_comments ) ) . '">' . $num_comments . '</a>';
						endif;
					?>
				</div><!-- /.entry-meta -->
			<?php
				endif;
			?>
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
			<div class="card-text entry-content">
				<?php
					// if ( has_post_thumbnail() ) {
					// 	echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
					// }

					if ( is_search() ) {
						the_excerpt();
					}
					// } else {
					// 	the_content();
					// }
				?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'cambridge-igcse-tuition' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- /.card-text -->
			<footer class="entry-meta">
				<a href="<?php the_permalink(); ?>" class="btn cta"><?php esc_html_e( 'Course Detail', 'cambridge-igcse-tuition' ); ?></a>
			</footer><!-- /.entry-meta -->
		</div><!-- /.card-body -->
	</div><!-- /.col -->
</article><!-- /#post-<?php the_ID(); ?> -->
