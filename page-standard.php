<?php
/**
 * Template Name: Page (Standard)
 * Description: Page template full width.
 *
 */

get_header();

the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'cambridge-igcse-tuition' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Page %', 'cambridge-igcse-tuition' ),
			)
		);
		edit_post_link(
			esc_attr__( 'Edit', 'cambridge-igcse-tuition' ),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</div><!-- /#post-<?php the_ID(); ?> -->
<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

get_footer();
