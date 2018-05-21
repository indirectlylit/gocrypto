<?php
/**
 * Sitewide masthead.
 *
 * @package goc
 */

?>
<header id="js-masthead" class="masthead">
	<div class="container">
		<div class="row grid-margin-x">
			<div class="col col-4 col-lg-2">
				<?php the_custom_logo(); ?>
			</div>
			<div class="col">
				<?php get_template_part( 'parts/layout/navigation/top' ); ?>
			</div>
		</div>
	</div>
</header>

<div class="site-overlay" aria-hidden="true" id="js-site-overlay"></div>
