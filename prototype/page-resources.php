<?php
/**
 * Template Name: Resources (prototype)
 *
 * @package goc
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // phpcs:ignore ?>

<main class="resources-page__main">

	<section class="resources-page__header">
		<div class="container">
			<div class="row grid-padding-x">
				<div class="col col-md-7">
					<h1 class="sup">Resources</h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	</section>

	<section class="resources-page__content">

		<div class="container">
			<div class="row resources-page__block-row">

				<?php foreach ( range( 1, 9 ) as $cat ) : ?>

					<div class="col-12 col-md-4">
						<article class="resource-block">
							<h3 class="resource-block__title"><?php echo esc_html( "Category $cat" ); ?></h3>
							<p>Class velit consequat sagittis odio pharetra aenean venenatis, varius posuere dignissim augue sodales risus in sem, malesuada rutrum cum id interdum sed.</p>
							<a href="<?php echo esc_url( get_category_link( 9 ) ); ?>" class="btn btn-outline-primary resource-block__btn">View Category</a>
						</article>
					</div>

				<?php endforeach; ?>

			</div>
			<div class="resources-page__more-btn">
				<a class="btn btn-primary" href="#">See More</a>
			</div>

		</div>

	</section>

	<?php get_template_part( 'parts/modules/section', 'cta' ); ?>

</main>

<?php endwhile; endif; // phpcs:ignore ?>

<?php get_footer(); ?>
