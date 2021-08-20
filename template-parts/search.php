<?php
get_header(); ?>

<main class="main contentcontainer" id="startcontent">
	<div class="container py-5">
		<?php if ( have_posts() ) {	?>
			<header class="page-header alignwide">
				<h1 class="page-title">
					<?php printf( /* translators: %s: Search term. */
						esc_html__( 'Results for "%s"', 'twentytwentyone' ),
						'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="search-result-count default-max-width">
				<?php	printf(	esc_html(	/* translators: %d: The number of search results. */
					_n(
						'We found %d result for your search.',
						'We found %d results for your search.',
						(int) $wp_query->found_posts,
						'twentytwentyone'
					)
				),
				(int) $wp_query->found_posts
			);
			?>
		</div><!-- .search-result-count -->
		<hr>
		<ul class="list-unstyled search-results">
			<?php	while ( have_posts() ) {
				the_post();	?>
				<li class="mb-4">
					<a class="mb-0" href="<?php echo get_the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<?php the_excerpt(); ?>
				</li>
			<?php	}	?>
		</ul>
	<?php } else { ?>
		<header class="page-header alignwide">
			<h1 class="page-title">
				<?php
				printf( /* translators: %s: Search term. */
					esc_html__( 'No results found for "%s"', 'twentytwentyone' ),
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				); ?>
			</h1>
		</header><!-- .page-header -->
	<?php } ?>
</div>
</main>

<?php get_footer(); ?>