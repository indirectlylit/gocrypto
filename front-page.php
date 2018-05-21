<?php
/**
 * Front page.
 *
 * @package goc
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // phpcs:ignore ?>

	<main class="front-page__main">

		<section class="front-page__header">
			<div class="container">
				<div class="row">
					<div class="col col-12 col-md-7">
						<h1 class="sup">Your Currency Choices Matter.</h1>
						<?php the_content(); ?>
						<p><em>Let's work together to protect your assets.</em></p>
						<p><a class="btn btn-primary" href="#">Contact Me</a></p>
					</div>
					<div class="col col-12 col-md-5">
						<div class="front-page__header-img">
							<?php echo file_get_contents( get_template_directory() . '/dist/img/home-header.svg' ); ?>
						</div>
					</div>
				</div>
			</div>

		</section>

		<section class="front-page__blocks">

			<?php $i = 0; foreach ( range( 1, 2 ) as $block ) : $i++; // phpcs:ignore ?>

				<?php $goc_col_class = $i % 2 !== 0 ? 'offset-md-4 offset-lg-3 offset-xl-1' : 'offset-md-2 offset-xl-4'; ?>

				<!-- block -->
				<div class="alt-block">
					<div aria-hidden="true" class="alt-block__icon">
						<?php echo file_get_contents( get_template_directory() . '/dist/img/icon-' . ( $i % 2 === 0 ? 'chess' : 'eye' ) . '.svg' ); ?>
					</div>
					<div class="container">
						<div class="row grid-padding-x">
							<div class="col col-md-6 col-lg-7 <?php echo $goc_col_class; // WPCS: XSS ok. ?>">
								<h1>Trillions of dollars are wasted every year due to bad actors, poor quality controls and inefficient processes.</h1>
								<p>We place our trust in massive companies who have access to some of our most private and vulnerable information.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- end block -->

			<?php endforeach; ?>

		</section>

		<?php get_template_part( 'parts/modules/section', 'cta' ); ?>

	</main>

<?php endwhile; endif; // phpcs:ignore ?>

<?php get_footer(); ?>
