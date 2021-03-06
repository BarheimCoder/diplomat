	</main>
	<div class="bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-8 mx-auto my-4">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="img-fluid" alt="<?php bloginfo('name'); ?>'s Logo">
					</a>
				</div>

				<div class="col-md-8 my-4">
					<?php	wp_nav_menu([
						'menu'            => 'footer',
						'theme_location'  => 'footer',
						'container'       => false,
						'container_id'    => 'bs4navbar',
						'container_class' => 'collapse navbar-collapse',
						'menu_id'         => false,
						'menu_class'      => 'list-unstyled',
						'depth'           => 2,
						'fallback_cb'     => 'bs4navwalker::fallback',
						'walker'          => new bs4navwalker()
					]);	?>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	<?php //include('template-parts/back-to-top.php'); ?>
</body>
</html>