<?php 
/*
Template Name: Custom Events Page
*/
get_header(); ?>
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
	
		
			<div class="inner-wrapper">
				<article class="page-single">
				  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="top-heading"><?php the_title();?></h1>

					<?php the_content()?>
		
				</article>

				<?php endwhile; else: ?>
		        <article class="page-single">
		          <p>Sorry, no posts matched your criteria.</p>
		        </article>
		      <?php endif; ?>
			</div>
		
	
</main>
</div>

<?php get_footer();?>