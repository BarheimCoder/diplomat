<?php get_header(); ?>

<div class="bg-light">
	<div class="container">
		<?php include('template-parts/cat-menu.php'); ?>
	</div>
</div>

<div class="container py-5">
	<h1>Browsing '<?php single_cat_title( __( '', 'textdomain') ); ?>' posts</h1>
	<hr>
	<div class="row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="col-sm-4 mb-4 p-3">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('post-thumbnail', ['class' => 'mr-3 img-fluid w-100']);
					}
					else {
						echo '<img class="mr-3 img-fluid w-100" src="' . get_template_directory_uri() . '/assets/images/thumbnail-default.png">';
					}
					?>
					<div class="p-3 bg-light">
						<?php echo the_category(' / '); ?><p class="text-muted d-inline ml-3"><?php echo get_the_date(); ?></p>
						<a href="<?php echo get_permalink(); ?>">
							<h2 class="my-3"><?php the_title(); ?></h2>
						</a>
						<?php echo get_the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>