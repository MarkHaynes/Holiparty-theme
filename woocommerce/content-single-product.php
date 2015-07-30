<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php

	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		
		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_excerpt - 7
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->


	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>


<?php
	if (isset($_POST["add-to-cart"])) {
		$id = (int)$_POST["add-to-cart"];
		holi_upsells_run();
	}
	else {

	}

	function holi_upsells_run() {
	  	$product2 = get_product( get_the_ID() );
	  	$id = (int) $product2->id;
	  	$product3 = new WC_Product($id);
   	  	$upsells = $product3->get_upsells();

	  	if (!$upsells) {
	   		return;
	  	}
      	else {
      		$meta_query = WC()->query->get_meta_query();
      		$args = array(
	         	'post_type' => 'product',
	          	'ignore_sticky_posts' => 1,
	         	'no_found_rows' => 1,
	         	'posts_per_page' => 4,
	          	'orderby' => 'rand',
	          	'post__in' => $upsells,
	          	'post__not_in' => array($product3->id),
	          	'meta_query' => $meta_query,
      		);

      		$upsellproducts = new WP_Query($args);
      
      		if ($upsellproducts->have_posts()) { ?>
       	 		<div id="popupupsells">
       	 		 <div class="upsell-message">"<?php echo get_the_title( $id );?>" was successfully added to your basket.</div>
        		 <h1>You May Also Like</h1>
        		<ul class="upsell-products">
        	<?php	
        		while ( $upsellproducts->have_posts() ) {
          			$upsellproducts->the_post();     
          			woocommerce_get_template_part( 'content', 'product' );      
        		}
        		
        		echo "</ul>";
        		echo '<a id="close-upsells" href="'. get_permalink($id) . '" title="Continue Shopping">Continue Shopping</a>';
        		echo '<a id="checkout-upsells" href="/cart" title="Checkout Now">Checkout Now</a>';
        		echo '</div>';
     		}
    		return;
  		}
  	}?>


