<div class="container py-5">
	<h1><?php the_title(); ?></h1>
	<hr>
	<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$wpb_all_query = new WP_Query(array(
		'post_type'=>'post',
		'posts_per_page'=> 9,
		'ignore_sticky_posts' => 1,
		'paged' => $paged
	));	?>
	<div class="row">
		<?php if ( $wpb_all_query->have_posts() ) : ?>
			<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
				<article class="col-sm-6 col-md-4 mb-4 p-3">
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
						<div class="excerpt">
							<?php echo get_the_excerpt(); ?>
						</div>
						<a href="<?php echo get_permalink(); ?>">Read more...</a>
					</div>
				</article>
			<?php endwhile; ?>
	</div>
</div>

<div class="d-flex justify-content-center">
	<div class="pagination mx-auto py-4 d-block">
		<?php 
		echo paginate_links( array(
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'total'        => $wpb_all_query->max_num_pages,
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'format'       => '?paged=%#%',
			'show_all'     => false,
			'type'         => 'plain',
			'end_size'     => 2,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => sprintf( '<i></i> %1$s', __( '<i class="fa fa-chevron-left"></i>', 'text-domain' ) ),
			'next_text'    => sprintf( '%1$s <i></i>', __( '<i class="fa fa-chevron-right"></i>', 'text-domain' ) ),
			'add_args'     => false,
			'add_fragment' => '',
		) );
		?>
	</div>
</div>

<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>