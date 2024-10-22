<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
<div class="row">
	<div class="col-md-12">
		<?php
			echo apply_filters( 'the_content', get_post_field( 'post_content', $page_id ) );

			edit_post_link( __( 'Edit', 'cambridge-igcse-tuition' ), '<span class="edit-link">', '</span>', $page_id );
		?>
	</div><!-- /.col -->
	<div class="col-md-12">
		<?php
			get_template_part( 'archive', 'loop' );
		?>
	</div><!-- /.col -->
</div><!-- /.row -->

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
