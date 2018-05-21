<?php
/**
 * Default page template.
 *
 * @package goc
 */

get_header(); ?>

<div class="page-default__container container">
	<div class="page-default__grid row">
		<div class="col col-12 col-md-8 col-lg-7">
			<main class="page-default__main">

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
				else :
					get_template_part( 'partials/content', 'none' );
				endif;
				?>

			</main>
		</div>

		<div class="col col-12 col-md-4 col-lg-5">
			<aside class="page-default__sidebar">
				<?php get_sidebar(); ?>
			</aside><!-- .columns -->
		</div>
	</div><!-- .row -->
</div>

<?php get_footer(); ?>
