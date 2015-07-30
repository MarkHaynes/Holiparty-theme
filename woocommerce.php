<?php get_header(); ?>
<div class="wrapper">
<main id="main-content">
	<?php get_template_part('promo-bar'); ?>
		<div class="content-wrap">
		<section class="content">
		
			<div class="inner-wrapper">
				<article class="page-single">
					<?php woocommerce_breadcrumb(); ?>
				    <?php woocommerce_content(); ?>
				    <?php woocommerce_breadcrumb(); ?>
				</article>

			</div>
		</section>
		</div>
</main>
</div>

<?php get_footer();?>