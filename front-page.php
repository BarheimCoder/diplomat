<?php
	/* Template Name: Home Page Template */
	get_header();
?>

<div class="container py-5">
	<h1><?php the_title(); ?></h1>
	<hr>
	<?php the_content(); ?>
</div>

<?php get_footer(); ?>