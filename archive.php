<?php
/**
 * The Template for displaying Archive pages.
 */

get_header();

if ( have_posts() ) :
?>
<header class="page-header">
	<div class="hero">
		<div class="container">
			<h1 class="page-title">
				<?php
					if ( is_day() ) :
						printf( esc_html__( 'Daily Archives: %s', 'cambridge-igcse-tuition' ), get_the_date() );
					elseif ( is_month() ) :
						printf( esc_html__( 'Monthly Archives: %s', 'cambridge-igcse-tuition' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'cambridge-igcse-tuition' ) ) );
					elseif ( is_year() ) :
						printf( esc_html__( 'Yearly Archives: %s', 'cambridge-igcse-tuition' ), get_the_date( _x( 'Y', 'yearly archives date format', 'cambridge-igcse-tuition' ) ) );
					else :
						esc_html_e( '', 'cambridge-igcse-tuition' );
					endif;

					$terms = get_the_terms( get_the_ID(), 'course_category' );

					if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							echo esc_html( $term->name );
						}
					}
				?>
			</h1>
		</div>
		
	</div>
	
</header>
<?php
	get_template_part( 'archive', 'loop' );
else :
	// 404.
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // End of the loop.

get_footer();
