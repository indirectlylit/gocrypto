<?php
/**
 * 404'd page
 *
 * @package goc
 */

get_header();
?>

<main class="e404-page__main">

	<section class="e404-page__header">
		<div class="container">
			<div class="row">
				<div class="col col-md-7">
					<h1 class="sup">Uh Oh!</h1>
					<?php esc_html_e( 'This content seems to be missing! Please check your URL or browse around the site to find what you are looking for.', 'goc' ); ?>
				</div>
			</div>
		</div>

	</section>

	<section class="e404-page__content">

		<div class="container">
			<div class="row">

				<div class="col-12 col-md-6 e404-page__content-col">
					<h2 class="h1 e404-page__heading">Follow me on:</h2>

					<nav class="e404-page__social-nav" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'goc' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-menu e404-page__social-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
						?>
					</nav>

				</div>
			</div>
		</div>

	</section>

</main>

<?php get_footer(); ?>
