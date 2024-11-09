<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="hero" style="background-color: <?php echo esc_attr(get_field('blog_post_colour') ? get_field('blog_post_colour') : '#F4F4F4'); ?>;">
			<div class="hero-overlay">
				<div class="container">
					<div class="tags">
					<?php
						$tags = get_the_tags();

						if ($tags) {
							foreach ($tags as $tag) {
								// Check if the tag is "Most Popular"
								if ($tag->name == 'Most Popular') {
									echo '<span class="tag most-popular">
											<i class="fa-solid fa-trophy"></i> ' . 
											$tag->name . 
										'</span>';
								} 
								// Check if the tag is "Recorded"
								elseif ($tag->name == 'Recorded') {
									echo '<span class="tag recorded">
											<i class="fa-solid fa-microphone"></i> ' . 
											$tag->name . 
										'</span>';
								} 
								// Check if the tag is "Live"
								elseif ($tag->name == 'Live') {
									echo '<span class="tag live">
											<i class="fa-solid fa-broadcast-tower"></i> ' . 
											$tag->name . 
										'</span>';
								} 
								// Default case for other tags
								else {
									echo '<span class="tag">' . $tag->name . '</span>';
								}
							}
						}
						?>
					</div>

					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
					
					<?php
						if ( 'post' === get_post_type() ) :
					?>
						<div class="entry-meta">
							<?php cambridge_igcse_tuition_article_posted_on(); ?>
						</div><!-- /.entry-meta -->
					<?php
						endif;
					?>
				</div>			
			</div>
		</div>
	</header><!-- /.entry-header -->

	<div class="entry-content" id="courseContent">
		<div class="container">
			
			<?php
				// if ( has_post_thumbnail() ) :
				// 	echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
				// endif;
				// ?>

				<div class="row">
					<div class="col-12 col-md-8">
						<div class="content-holder">
							<?php
								the_content();
							?>
						</div>					
					</div>
					<div class="col-12 col-md-4">
						<div class="side-card">
							<div class="row">
							<?php
							// Get the current post's ID and post type
							$current_post_id = get_the_ID();
							$post_type = get_post_type($current_post_id);

							// Set up the WP_Query arguments
							$args = array(
								'post_type'      => $post_type,
								'posts_per_page' => 5,
								'post__not_in'   => array($current_post_id), // Exclude the current post
								'orderby'        => 'rand', // Randomize posts
							);

							// Execute the query
							$related_posts = new WP_Query($args);

							if ($related_posts->have_posts()) : ?>
								<h3 class="side-card-header">Related Posts</h3>
								<ul class="related-posts">
									<?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</li>
									<?php endwhile; ?>
								</ul>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>

								<div class="row">
									<h4>Know someone who would benefit from this post?</h4>
									<p>Why not share it with them?</p>
									<button id="copyLinkButton" onclick="copyLinkToClipboard()" class="cta">Copy Link <i class="fa-regular fa-copy"></i></button>
									<p id="copyMessage" style="display:none;">Link copied to clipboard!</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
				wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'cambridge-igcse-tuition' ) . '</span>', 'after' => '</div>' ) );
			?>
		</div>
		
	</div><!-- /.entry-content -->

	<?php
		edit_post_link( __( 'Edit', 'cambridge-igcse-tuition' ), '<span class="edit-link">', '</span>' );
	?>

	<footer class="entry-meta d-none">
		<hr>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'cambridge-igcse-tuition' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'cambridge-igcse-tuition' ) );
			if ( '' != $tag_list ) :
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cambridge-igcse-tuition' );
			elseif ( '' != $category_list ) :
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cambridge-igcse-tuition' );
			else :
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cambridge-igcse-tuition' );
			endif;

			printf(
				$utility_text,
				$category_list,
				$tag_list,
				esc_url( get_the_permalink() ),
				the_title_attribute( array( 'echo' => false ) ),
				get_the_author(),
				esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) )
			);
		?>
		<hr>
		<?php
			get_template_part( 'author', 'bio' );
		?>
	</footer><!-- /.entry-meta -->
</article><!-- /#post-<?php the_ID(); ?> -->

<section id="contact" class="contact-section">
	<div class="contact-section-form-holder" style="background-color: <?php echo esc_attr(get_field('blog_post_colour')); ?>;">
		<div class="backdrop">
			<div class="content">
				<h3>Leave a message</h3>
				<?php
					echo do_shortcode('[contact-form-7 id="f64b68e" title="Leave a message"]');
				?>
			</div>
		</div>
	</div>
</section>
