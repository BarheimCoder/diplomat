<?php
/************************************************/
// Quantity + and - Buttons
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
function bbloomer_display_quantity_plus() {
	echo '<div class="input-group-append mr-3"><a class="btn btn-secondary qty-plus font-weight-bold"><i class="fa fa-plus text-light"></i></a></div></div>';
}

add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
function bbloomer_display_quantity_minus() {
	echo '<div class="input-group"><div class="input-group-prepend"><a class="btn btn-secondary qty-minus font-weight-bold"><i class="fa fa-minus text-light"></i></a></div>';
}

add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
function bbloomer_add_cart_quantity_plus_minus() {
	if ( ! is_product() && ! is_cart() ) return;

	wc_enqueue_js( "
		jQuery('.qty-minus').click(function () {
			let total = +jQuery(this).parent().parent().find('.qty').val() - 1;
			jQuery(this).parent().parent().find('.qty').val(total);
		});

		jQuery('.qty-plus').click(function () {
			let total = +jQuery(this).parent().parent().find('.qty').val() + 1;
			jQuery(this).parent().parent().find('.qty').val(total);
		});
	");
}

/************************************************/
// Updates Cart Count when used with AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
	$fragments['span.count'] = '<span class="count">(' . WC()->cart->get_cart_contents_count() . ')</span>';
	return $fragments;
}
?>