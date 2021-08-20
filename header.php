<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Portfolio Design | https://www.portfoliodesign.net">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/25d752ca7a.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-4 col-lg-2 py-3">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="img-fluid" alt="<?php bloginfo('name'); ?>'s Logo">
					</a>
				</div>

				<div class="col-8 col-lg-10 d-flex flex-column justify-content-center">
					<div class="d-flex justify-content-end w-100 pr-lg-2">
						<ul class="list-unstyled list-inline mb-0">
							<li class="list-inline-item d-none d-lg-inline mx-4">
								<a href="#" target="_blank" rel="noopener" title="<?php bloginfo('name'); ?> on Facebook">
									<i class="fa fa-facebook fa-2x"></i>
								</a>
							</li>

							<li class="list-inline-item d-none d-lg-inline mx-4">
								<a href="#" target="_blank" rel="noopener" title="<?php bloginfo('name'); ?> on Twitter">
									<i class="fa fa-twitter fa-2x"></i>
								</a>
							</li>


							<li class="list-inline-item d-none d-lg-inline mx-4">
								<a href="#" target="_blank" rel="noopener" title="<?php bloginfo('name'); ?> on Instagram">
									<i class="fa fa-instagram fa-2x"></i>
								</a>
							</li>


							<li class="list-inline-item d-none d-lg-inline mx-4">
								<a href="#" target="_blank" rel="noopener" title="<?php bloginfo('name'); ?> on TikTok">
									<i class="fab fa-tiktok fa-2x"></i>
								</a>
							</li>

							<li class="list-inline-item d-none d-lg-inline mx-4">
								<a href="#" target="_blank" rel="noopener" title="<?php bloginfo('name'); ?> on Youtube">
									<i class="fab fa-youtube fa-2x"></i>
								</a>
							</li>

							<?php	if ( class_exists( 'WooCommerce' ) ) { ?>
								<?php	if ( is_user_logged_in() ) : ?>
									<li class="list-inline-item">
										<a class="px-2" href="<?php the_permalink( get_page_by_path( 'my-account' ) ); ?>">
										My Account <i class="fas fa-user"></i>
									</a>
									</li>
								<?php	else : ?>
									<li class="list-inline-item">
										<a class="px-2" href="<?php the_permalink( get_page_by_path( 'my-account' ) ); ?>">
										Log In <i class="fas fa-user"></i>
									</a>
									</li>
								<?php	endif; ?>

								<li class="list-inline-item">
									<a href="<?php the_permalink( get_page_by_path( 'basket' ) ); ?>">
										Cart <span>(<?php echo WC()->cart->get_cart_contents_count();?>)</span>
										<i class="fas fa-shopping-basket"></i>
									</a>
								</li>
							<?php }	?>
						</ul>
					</div>

					<!-- Nav -->
					<nav class="navbar navbar-expand-lg navbar-dark bg-faded d-flex px-0">
						<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<?php
						wp_nav_menu([
							'menu'            => 'top',
							'theme_location'  => 'top',
							'container'       => 'div',
							'container_id'    => 'bs4navbar',
							'container_class' => 'collapse navbar-collapse',
							'menu_id'         => false,
							'menu_class'      => 'navbar-nav ml-auto',
							'depth'           => 2,
							'fallback_cb'     => 'bs4navwalker::fallback',
							'walker'          => new bs4navwalker()
						]);
						?>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<main class="main" id="startcontent">