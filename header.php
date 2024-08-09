<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'cambridge-igcse-tuition' ); ?></a>

<div id="wrapper">
	<header>
		<nav id="header" class="navbar navbar-expand-xl <?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
				</a>

				<!-- <button class="navbar-toggler d-block d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'cambridge-igcse-tuition' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button> -->

				<button class="btn d-flex d-xl-none offcanvas-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav" aria-controls="offcanvasNav">
					<span class="menu-label">Menu</span>
					<div class="lines">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</div>
					
				</button>

				<div class="offcanvas offcanvas-end d-block d-xl-none" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavLabel">Menu</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div class="dropdown mt-3">
						<?php
						// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
								array(
									'menu_class'     => 'navbar-nav',
									'container'      => '',
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
									'theme_location' => 'main-menu',
								)
							);
						?>
						</div>
					</div>
				</div>

				<div id="navbar" class="collapse navbar-collapse justify-content-end">
					<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'menu_class'     => 'navbar-nav',
								'container'      => '',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
								'theme_location' => 'main-menu',
							)
						);

						if ( '1' === $search_enabled ) :
					?>
							<form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'cambridge-igcse-tuition' ); ?>" title="<?php esc_attr_e( 'Search', 'cambridge-igcse-tuition' ); ?>" />
									<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e( 'Search', 'cambridge-igcse-tuition' ); ?></button>
								</div>
							</form>
					<?php
						endif;
					?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="container-fluid"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 0px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if ( is_single() || is_archive() ) :
		?>
			<div class="row">
				<div class="col-md-8 col-sm-12">
		<?php
			endif;
		?>
