<?php
/**
 * Single post template.
 *
 * @package goc
 */

get_header(); ?>

<?php
/**
 * Default page template.
 *
 * @package goc
 */

get_header(); ?>

<div class="single-post__container container">
	<div class="single-post__grid row">
		<div class="col col-12 col-md-8 col-lg-7">
			<main class="single-post__main">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>
						<header class="single-post__header">

							<?php if ( get_the_category() ) : ?>

								<span class="single-post__category"><?php echo esc_html( get_the_category()[0]->name ); ?></span>

							<?php endif; ?>

							<?php the_title( '<h1 class="single-post__title">', '</h1>' ); ?>

							<?php the_post_thumbnail( 'large', array( 'class' => 'single-post__img' ) ); ?>

						</header>
						<div class="single-post__content">
							<?php the_content(); ?>
						</div>
						<?php
					endwhile;
				else :
					get_template_part( 'partials/content', 'none' );
				endif;
				?>
			</main>
		</div>
		<div class="col col-12 col-md-4 col-lg-5">

			<aside class="single-post__sidebar">
				<?php get_sidebar(); ?>
			</aside><!-- .columns -->

		</div><!-- .cell -->
	</div><!-- .row -->
</div>

<?php get_footer(); ?>
