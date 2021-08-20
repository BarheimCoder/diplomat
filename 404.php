<?php get_header(); ?>

<main class="main" id="startcontent">
	<div class="row">
		<div class="col">
			<div class="container">
				<div class="row d-flex align-items-center" style="min-height: 50vh;">
					<div class="col-12">
						<h1 class="display-1">404: Page Not Found</h1>
						<p>Sorry the page you were trying to access does not exist or has moved.</p>
						<p>Double check the URL or <a href="<?php echo the_siteurl(); ?>">get back to the home page</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>