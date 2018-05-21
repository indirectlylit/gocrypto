<?php
/**
 * Template Name: Contact (prototype)
 *
 * @package goc
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // phpcs:ignore ?>

<main class="contact-page__main">

	<section class="contact-page__header">
		<div class="container">
			<div class="row grid-padding-x">
				<div class="col col-md-7">
					<h1 class="sup">Contact</h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	</section>

	<section class="contact-page__content">

		<div class="container">
			<div class="row grid-padding-x">

				<div class="col-12 col-md-6 contact-page__content-col">
					<h2 class="h1 contact-page__heading">Follow me on:</h2>

					<nav class="contact-page__social-nav" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'goc' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-menu contact-page__social-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
						?>
					</nav>

				</div>

				<div class="col-12 col-md-6 contact-page__content-col">
					<h2 class="h1 contact-page__heading">Drop Me a Line</h2>
					<p>Class velit consequat sagittis odio pharetra aenean venenatis, varius posuere dignissim augue sodales risus in sem, malesuada rutrum cum id interdum sed.</p>

					<form class="form">
						<div class="form__field-wrapper">
							<label class="form__label" for="user-name">Name</label>
							<input class="form__input" name="user-name" id="user-name" type="text" />
						</div>
						<div class="form__field-wrapper">
							<label class="form__label" for="user-email">Email</label>
							<input class="form__input" name="user-email" id="user-email" type="text" />
						</div>
						<div class="form__field-wrapper">
							<label class="form__label" for="user-message">Message</label>
							<textarea class="form__input" name="user-message" id="user-message" rows="4"></textarea>
						</div>
						<div class="form__field-wrapper">
							<button class="btn btn-primary form__button" type="submit" value="Submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>

</main>

<?php endwhile; endif; // phpcs:ignore ?>

<?php get_footer(); ?>
