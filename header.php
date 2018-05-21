<?php
/**
 * Theme header.
 *
 * @package goc
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'before' ); // WPCS: prefix ok. ?>

<div class="site-wrapper">
	<?php get_template_part( 'parts/layout/navigation/mobile' ); ?>
	<div class="off-canvas-content" id="js-off-canvas-content">
		<?php get_template_part( 'parts/layout/header/masthead' ); ?>
		<div id="primary" class="content-area">
