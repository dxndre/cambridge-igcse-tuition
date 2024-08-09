			<?php
				// If Single or Archive (Category, Tag, Author or a Date based page).
				if ( is_single() || is_archive() ) :
			?>
					</div><!-- /.col -->

					<?php
						get_sidebar();
					?>

				</div><!-- /.row -->
			<?php
				endif;
			?>
		</main><!-- /#main -->
		<footer id="footer">
			<div class="footer-logo container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-light.png" alt="Logo">
				</a>
			</div>
		<div class="container">
			<div class="row footer-content">
				<ul class="col-12 col-sm-6 col-md-5 contact order-md-last ms-auto">
					<h4>Connect with us</h4>
					<ul class="social-icons">
						<li><a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
						<li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
					</ul>
					<h4>Email Me</h4>
					<p><a class="email-link" href="mailtoms.malik36@googlemail.com">ms.malik36@googlemail.com</a></p>
					
				</ul>
				<div class="col-12 col-sm-6 col-md-4">
					<?php
						if ( has_nav_menu( 'footer-menu' ) ) : // See function register_nav_menus() in functions.php
							/*
								Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
								Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
								!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
							*/
							wp_nav_menu(
								array(
									'container'       => 'nav',
									// 'container_class' => 'col-md-6',
									//'fallback_cb'     => 'WP_Bootstrap4_Navwalker_Footer::fallback',
									'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
									'theme_location'  => 'footer-menu',
									'items_wrap'      => '<ul class="footer-menu">%3$s</ul>',
								)
							);
						endif;
					?>
				</div>

			</div>
			<div class="footer-legal">
				<p class="copyright">© <span id="copyYear">2024</span> Cambridge iGCSE Tuition by <a href="http://www.dxndre.co.uk" target="_blank">DXNDRE.</a></p>

				<div class="right-links ms-auto">
					<ul>
						<li><a href="#">Merchant Policies</a></li>
						<li><a href="#">Legal Notice</a></li>
					</ul>
				</div>
			</div>
			</div>
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
</body>
</html>
