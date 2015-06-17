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
				<div class="inner-wrapper">
					
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?><!--
					--><article class="article-list">
						<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
						   <?php if ( has_post_thumbnail() ) {
			              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'article-list' );
			                 echo '<img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/>';
			                 }; ?> 
		                 </a>
						  
						<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><h1><?php the_title();?></h1></a>
					</article><!--
				--><?php endwhile; else: ?>
			        <article class="article-list">

			        </article>
			      <?php endif; ?>
			      <div class="bottom-nav bottom"><?php posts_nav_link( ' &#183; ', 'Previous Page', 'Next Page' ); ?></div>
				</div>	
	</main>
</div>

<?php get_footer();?>