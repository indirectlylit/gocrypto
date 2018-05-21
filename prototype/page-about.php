<?php
/**
 * Template Name: About (prototype)
 *
 * @package goc
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // phpcs:ignore ?>

<main class="about-page__main">

	<section class="about-page__header">
		<div class="container">
			<div class="row grid-padding-x">
				<div class="col col-md-6">
					<h1 class="sup">Hello!</h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	</section>

	<section class="about-page__content">

		<div class="container">
			<div class="row grid-padding-x">

				<div class="col col-md-6">
					<h2>Why I do what I do</h2>
					<p>Class velit consequat sagittis odio pharetra aenean venenatis, varius posuere dignissim augue sodales risus in sem, malesuada rutrum cum id interdum sed.</p>
				</div>

				<div class="col col-md-6">
					<h2>Why you're visiting this site</h2>
					<p>Class velit consequat sagittis odio pharetra aenean venenatis, varius posuere dignissim augue sodales risus in sem, malesuada rutrum cum id interdum sed.</p>
				</div>
			</div>
		</div>

	</section>

	<?php get_template_part( 'parts/modules/section', 'cta' ); ?>

</main>

<?php endwhile; endif; // phpcs:ignore ?>

<?php get_footer(); ?>
