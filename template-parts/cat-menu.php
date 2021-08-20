<?php if(is_category()) {
	$tags = get_categories();
} elseif(is_tag()) {
	$tags = get_tags();
} ?>

<ul class="list-group list-inline list-group-horizontal flex-wrap">
	<?php 
	$html = '<div class="post_tags">';
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );
		?>
		<li class="list-item py-3 mr-3"><a href="<?php echo ($tag_link); ?>"><?php echo ($tag->name); ?></a></li>
		<?php
	}
	?>
</ul>