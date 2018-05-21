<?php
/**
 * Default page template.
 *
 * @package goc
 */

get_header(); ?>

<div class="page-index__container container">
	<div class="page-index__grid row">
		<div class="col col-12 col-md-8 col-lg-7">
			<main class="page-index__main">
				<header class="page-index__header">
					<?php the_archive_title( '<h1 class="page-index__title">', '</h1>' ); ?>
				</header>
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'parts/archive-post' );
					endwhile;
				else :
					get_template_part( 'partials/content', 'none' );
				endif;
				?>
			</main>
		</div>
		<div class="col col-12 col-md-4 col-lg-5">

			<aside class="page-index__sidebar">
				<?php get_sidebar(); ?>
			</aside><!-- .columns -->

		</div><!-- .cell -->
	</div><!-- .row -->
</div>

<?php get_footer(); ?>
