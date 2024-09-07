<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="hero" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-bg.jpg' ); ?>')">
			<div class="container">
				<div class="breadcrumbs">
					<?php custom_course_breadcrumbs(); ?>
				</div>
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
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
				<div class="buttons-holder">
					<a class="btn btn-primary cta" href="<?php echo get_field('store_page_link') ?>" target="_blank">Buy Course <i class="fa-solid fa-cart-shopping"></i></a>
					<a class="read-more-link" href="#courseContent">Read More</a>
				</div>
				
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
								<h3 class="side-card-header">This course is part of the
							<?php
								// Get the categories associated with the current post
								$terms = get_the_terms( get_the_ID(), 'course_category' );

								if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
									foreach ( $terms as $term ) {
										echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
									}
								}
							?> series.
							</h3>
							<div class="price">
								<span class="value">
									<?php
									$price = get_field('price');

									// Output the price
									if ($price) {
										echo $price;
									} else {
										echo 'Price not available';
									}
									?>
								</span>
								
							</div>
							
							<a class="btn cta buy" href="<?php echo get_field('store_page_link') ?>" target="_blank">Buy this Course <i class="fa-solid fa-cart-shopping"></i></a>
							<div class="row">
								<h4>Know someone who would benefit from this course?</h4>
								<p>Why not share it with them?</p>
								<button id="copyLinkButton" onclick="copyLinkToClipboard()" class="cta">Copy Link <i class="fa-regular fa-copy"></i></button>
								<p id="copyMessage" style="display:none;">Link copied to clipboard!</p>	

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
	<div class="contact-section-form-holder" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-archive-bg-2.jpg' ); ?>')">
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
