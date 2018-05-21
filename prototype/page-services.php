<?php
/**
 * Template Name: Services (prototype)
 *
 * @package goc
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // phpcs:ignore ?>

<main class="services-page__main">

	<section class="services-page__header">
		<div class="container">
			<div class="row grid-padding-x">
				<div class="col col-md-7">
					<h1 class="sup">My services</h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	</section>

	<section class="services-page__services">

		<?php foreach ( range( 1, 3 ) as $service ) : ?>

			<!-- service-block -->
			<div class="container service-block__container">
				<article class="service-block">
					<div class="row grid-padding-x">
						<div class="col col-12 col-md-4 service-block__img-col">
							<img class="service-block__img" src="https://picsum.photos/800/800" alt="Description" />
						</div>
						<div class="col col-12 col-md-8 service-block__content-col">
							<h1 class="service-block__title"><?php echo esc_html( "Service $service Example" ); ?></h1>
							<p>Odio porttitor euismod volutpat non faucibus lorem integer, sed facilisis quisque maecenas lacinia neque elementum cubilia, mauris metus bibendum hac congue class. Euismod habitant eros cursus a blandit et amet aptent, dignissim odio tempor sociis congue enim vehicula.</p>
							<p><a href="<?php echo esc_url( get_page_link( 33 ) ); ?>" class="btn btn-outline-primary">Learn More</a></p>
						</div>
					</div>
				</article>
			</div>

		<?php endforeach; ?>

	</section>

	<?php get_template_part( 'parts/modules/section', 'cta' ); ?>

</main>

<?php endwhile; endif; // phpcs:ignore ?>

<?php get_footer(); ?>
