<section id="promo-bar">
	<div class="inner-wrapper">
		<div class="promo-info-wide">
			<span>We supply coloured throwing powder, also known as 'Holi' or 'Gulal' powder, in convenient packages.</span>
		</div>
		<div class="promo-image">
			<img src="<?php bloginfo('template_url'); ?>/images/promo/bagicon.png">
		</div>
		<div class="promo-cell"> 
			<span><?php 
			$options = get_option( 'holi_option_name' );

			if (!empty($options['box_one'])) {
				echo $options['box_one'];
			}
			else {
				echo "Ready to Throw Bags";
			}
			
			?></span>
		</div>
		<div class="promo-image">
			<img src="<?php bloginfo('template_url'); ?>/images/promo/bundleicon.png">
		</div>
		<div class="promo-cell">
					<span><?php 
			$options = get_option( 'holi_option_name' );

			if (!empty($options['box_two'])) {
				echo $options['box_two'];
			}
			else {
				echo "Multicoloured Party Bundles";
			}
			
			?></span>
		</div>
		<div class="promo-image">
			<img src="<?php bloginfo('template_url'); ?>/images/promo/largebundleicon.png">
		</div>
		<div class="promo-cell">
					<span><?php 
			$options = get_option( 'holi_option_name' );

			if (!empty($options['box_three'])) {
				echo $options['box_three'];
			}
			else {
				echo "Event and Festival Bundles.";
			}
			
			?></span>
		</div>
	</div>
</section>

<section id="shipping-bar">
	<div class="inner-wrapper">
		<img class="free-shipping" src="<?php bloginfo('template_url'); ?>/images/promo/shipping.png" alt="Free Shipping">
		<span>Free shipping to mainland UK addresses with all orders!</span>
	</div>
</section>