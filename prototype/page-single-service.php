<?php
/**
 * Template Name: Single Service (prototype)
 *
 * @package goc
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // phpcs:ignore ?>

<main class="single-service__main">

	<section class="single-service__header">
		<div class="container">
			<div class="row">
				<div class="col col-md-7">
					<?php the_title( '<h1 class="sup">', '</h1>' ); ?>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	</section>

	<section class="single-service__blocks">

		<?php
		$goc_blocks = array(
			'Here is the problem you\'re trying to solve',
			'Here is why it\'s a problem you should focus on right now',
			'Here is how my service solves that problem',
		);
		?>

		<?php foreach ( $goc_blocks as $block ) : ?>

			<!-- service-block -->
			<article class="single-service-block">
				<div class="container">
					<div class="row single-service-block__row">
						<div class="col col-12 col-md-4 col-lg-5">
							<img src="https://picsum.photos/800/800" class="single-service-block__img" alt="Service image description" />
							<!-- image -->
						</div>
						<div class="col col-12 col-md-8 col-lg-7">
							<div class="single-service-block__content">
								<h2 class="h1 single-service-block__heading"><?php echo esc_html( $block ); ?></h2>
								<p>Odio porttitor euismod volutpat non faucibus lorem integer, sed facilisis quisque maecenas lacinia neque elementum cubilia, mauris metus bibendum hac congue class. Euismod habitant eros cursus a blandit et amet aptent, dignissim odio tempor sociis congue enim vehicula.</p>
							</div>
						</div>
					</div>
				</div>
			</article>

		<?php endforeach; ?>

	</section>

	<?php get_template_part( 'parts/modules/section', 'cta' ); ?>

</main>

<?php endwhile; endif; // phpcs:ignore ?>

<?php get_footer(); ?>
