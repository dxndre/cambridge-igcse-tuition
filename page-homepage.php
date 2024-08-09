<?php
/**
 * Template Name: Homepage
 * Description: Page template for Homepage.
 *
 */

get_header();

the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<h1 class="entry-title d-none"><?php the_title(); ?></h1>
	<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'revive-sports-therapy' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Page %', 'revive-sports-therapy' ),
			)
		);
		edit_post_link(
			esc_attr__( 'Edit', 'revive-sports-therapy' ),
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
