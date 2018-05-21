<?php
/**
 * Theme footer.
 *
 * @package goc
 */

?>

		</div><!-- .content-area -->
		<footer id="js-site-footer" class="site-footer">

			<section class="site-footer__top">
				<div class="container">
					<div class="row grid-padding-x">

						<!-- main menu column -->
						<div class="col col-12 col-md-2">

							<?php if ( has_nav_menu( 'main-navigation' ) ) : ?>

								<nav class="site-footer__main-nav">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'main-navigation',
										'menu_class'     => 'footer-main-nav menu',
									) );
									?>
								</nav><!-- .social-navigation -->

							<?php endif; ?>

						</div><!-- .cell -->

						<!-- secondary menu column 1 -->
						<div class="col col-12 col-md-3">
							<!-- nav 2 -->

							<?php if ( has_nav_menu( 'footer-col-1' ) ) : ?>

								<nav class="site-footer__secondary-nav">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-col-1',
										'menu_class'     => 'footer-secondary-nav menu',
									) );
									?>
								</nav><!-- .social-navigation -->

							<?php endif; ?>

						</div><!-- .cell -->

						<!-- secondary menu column 2 -->
						<div class="col col-12 col-md-3">

							<?php if ( has_nav_menu( 'footer-col-2' ) ) : ?>

								<nav class="site-footer__secondary-nav">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-col-2',
										'menu_class'     => 'footer-secondary-nav menu',
									) );
									?>
								</nav><!-- .social-navigation -->

							<?php endif; ?>

						</div><!-- .cell -->

						<!-- logo column  -->
						<div class="col">
							<img src="<?php echo get_template_directory_uri() . '/dist/img/logo_gocrypto_white.svg'; ?>" alt="GoCrypto Logo" />
						</div><!-- .cell -->

					</div><!-- .grid-x -->
				</div><!-- .grid-container -->
			</section><!-- .site-footer__top -->

			<section class="site-footer__bottom">
				<div class="container">
					<div class="row grid-padding-x">

						<!-- copyright column -->
						<div class="col col-12 col-md-6">
							<p class="copyright">2018 &copy; GoCrypto | <a href="#">Terms &amp; Conditions</a></p>
						</div>

						<!-- social nav column -->
						<div class="col">

							<?php
							if ( has_nav_menu( 'social' ) ) :
								?>
								<nav class="site-footer__social-nav" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'goc' ); ?>">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-menu menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
									?>
								</nav><!-- .social-navigation -->

							<?php endif; ?>
						</div>
					</div>
				</div>
			</section><!-- .site-footer__bottom -->
		</footer>
	</div><!-- .off-canvas-content -->
</div><!-- .off-canvas-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
