<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();

$search_enabled = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<header class="entry-header">
	<div class="hero" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: get_template_directory_uri() . '/assets/images/course-archive-bg-2.jpg' ); ?>')">
		<div class="container">
			<h1 class="entry-title"><?php esc_html_e( 'Not found', 'cambridge-igcse-tuition' ); ?></h1>
			<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'cambridge-igcse-tuition' ); ?></p>
		<div>
			<?php
				if ( '1' === $search_enabled ) :
					get_search_form();
				endif;
			?>
		</div>
		</div>			
	</div>
</header><!-- /.entry-header -->

<div id="post-0" class="content error404 not-found">
	<div class="entry-content">
		
	</div><!-- /.entry-content -->
</div><!-- /#post-0 -->
<?php
get_footer();
