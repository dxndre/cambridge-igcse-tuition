<?php
/**
 * The template for displaying the archive loop.
 */



if ( have_posts() ) :
?>

<div class="archive-content">
	<div class="container">
		<div class="row posts-container">
		<?php
			while ( have_posts() ) :
				the_post();

				/**
				 * Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'index' ); // Post format: content-index.php
			endwhile;
		?>
		</div>
	</div>
</div>

	
<?php
endif;

wp_reset_postdata();

cambridge_igcse_tuition_content_nav( 'nav-above' );
cambridge_igcse_tuition_content_nav( 'nav-below' );
