<?php get_header(); ?>
<div class="wrapper">
<main id="main-content">
	<section id="promo-bar">
		<div class="inner-wrapper">
			<div class="promo-info-wide">
				<span>We supply coloured throwing powder, also known as Holi and Gulal Powder in convenient packages.</span>
			</div>

			<div class="promo-image">
				<img src="<?php bloginfo('template_url'); ?>/images/promo/bagicon.png">
			</div>
			<div class="promo-cell"> 
				<span>Ready to throw 100g Bags.</span>
			</div>

			<div class="promo-image">
				<img src="<?php bloginfo('template_url'); ?>/images/promo/bundleicon.png">
			</div>
			<div class="promo-cell">
				<span>Multicoloured Party Bundles</span>
			</div>
			<div class="promo-image">
				<img src="<?php bloginfo('template_url'); ?>/images/promo/largebundleicon.png">
			</div>
			<div class="promo-cell">
				<span>Event and Festival Bundles.</span>
			</div>
		</div>
	</section>

	</div>
		<div class="content-wrap">
		<section class="content">
		
			<div class="inner-wrapper">
				<article class="page-single">
				  <?php woocommerce_content(); ?>
				</article>

			</div>
		</section>
		</div>
</main>
</div>

<?php get_footer();?>