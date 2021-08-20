<?php get_header(); ?>

<div class="container py-5">  
	<?php
	while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<div class="mb-4">
			<?php echo the_category(' / '); ?><p class="text-muted d-inline ml-3"><?php echo get_the_date(); ?></p>
		</div>
		<?php	the_content(); ?>
		<hr>
		<?php
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:' ) . '</span> ' .
			'<span class="post-title">%title <i class="fa fa-chevron-right"></i></span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:' ) . '</span> ' .
			'<span class="post-title"><i class="fa fa-chevron-left"></i> %title</span>',
		) );
	endwhile;
	?>
</div>

<?php get_footer(); ?>