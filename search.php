<?php
/**
 * The Template for displaying Search Results pages.
 */

get_header();

if ( have_posts() ) :
?>	
	<header class="page-header">
	<div class="hero">
			<div class="overlay"></div> <!-- Overlay -->
			<div class="container">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'cambridge-igcse-tuition' ), get_search_query() ); ?></h1>
			</div>
		</div>
	</header>
<?php
	get_template_part( 'archive', 'loop' );
else :
?>
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'cambridge-igcse-tuition' ); ?></h1>
		</header><!-- /.entry-header -->
		<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cambridge-igcse-tuition' ); ?></p>
		<?php
			get_search_form();
		?>
	</article><!-- /#post-0 -->
<?php
endif;
wp_reset_postdata();

get_footer();
