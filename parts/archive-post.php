<?php
/**
 * Post block for archive pages.
 *
 * @package goc
 */

?>
<article class="archive-post">
	<?php the_title( '<h2 class="archive-post__title">', '</h2>' ); ?>
	<div class="archive-post__content">
		<?php the_excerpt(); ?>
		<a class="archive-post__more-link" href="<?php the_permalink(); ?>">Read More</a>
	</div>
</article>
