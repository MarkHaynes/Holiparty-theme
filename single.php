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
				  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				  	
						   <?php if ( has_post_thumbnail() ) {
			              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'single-post' );
			                 echo '<img class="featured-image" src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/>';
			                 }; ?> 
		            
					<h1 class="top-heading"><?php the_title();?></h1>

					<?php the_content()?>
		
				</article>

				<?php endwhile; else: ?>
		        <article class="page-single">
		          <p>Sorry, no posts matched your criteria.</p>
		        </article>
		      <?php endif; ?>
			</div>
		</section>
	</div>
	
</main>
</div>

<?php get_footer();?>