<?php get_header(); ?>
<div class="wrapper">
<main id="main-content">

	<section id="top-wrap">
		<?php get_template_part('slider'); ?>
	</section><!--
		--><section id="promo-bar">
		<div class="inner-wrapper">
			<div class="promo-info-wide">
				<span>We supply coloured throwing powder, also known as 'Holi' or 'Gulal' powder, in convenient packages.</span>
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

	
		<section class="shop-button-wrap">
			<div class="inner-wrapper">
				<span class="shop-button"><a class="box-link green-link" href="http://www.amazon.co.uk/s/ref=bl_dp_s_web_468292?ie=UTF8&field-keywords=HoliParty&index=toys-uk&search-type=ss" title="Visit Our Shop on Amazon">Shop Online on Amazon</a></span><!--
			 --><span class="shop-button"><a class="box-link blue-link" href="http://www.ebay.co.uk/itm/Holi-Coloured-Throwing-Powder-UK-BEST-PRICE-100g-Bags-6-Colours-Made-in-UK-/271874299382?pt=LH_DefaultDomain_3&var=&hash=item3f4cf895f6" title="Visit Our Shop on Ebay">Shop Online on Ebay</a></span>
			</div>
		</section>
	

	<div id="safety-wrap">
		<section id="safety">
			<div class="inner-wrapper">
				<h1>Our Powder Is,</h1>

				<div class="safety-info-wrap">				
					<div class="safety-info first-box">
						<div class="safety-image">
					    	<img src="<?php bloginfo('template_url'); ?>/images/safety/safeicon.png">
					    </div><!--
					   --><div class="safety-text">
					    	<h2>Completely Safe</h2>
					    	<p>Safe to get on your skin and in your hair. </p>
					    </div>
					</div><!--
					   --><div class="safety-info">
						<div class="safety-image"><img src="<?php bloginfo('template_url'); ?>/images/safety/washableicon.png">
					    </div><!--
					 --><div class="safety-text">
					    	<h2>Easy To Clean</h2>
					    	<p>Simply washes off skin, hair and clothes.</p>
					    </div><!--
					   --></div>
					<div class="safety-info">
						<div class="safety-image">
					    	<img src="<?php bloginfo('template_url'); ?>/images/safety/nonetoxicicon.png">
					    </div><!--
					 --><div class="safety-text">
					    	<h2>Eco-Friendly</h2>
					    	<p>Non-toxic, biodegradable and clears away with rain.</p>
					    </div>
					</div>
				</div>

				<p class="safety-tag">Our product is manufactured here within the UK specifically for the purpose of throwing and is completely safe to use, being compliant with EU safety regulations for your absolute peace of mind.</p>
				
				<a class="box-link purple-link" href="faqs" title="Learn More about our powder">Learn More...</a>

			</div> <!-- Inner Wrapper -->
		</section>
	</div>
	<div class="content-wrap">
		<section class="content">
			<div class="inner-wrapper">
				<article class="content-left">
					<?php if ( have_posts() ) : ?>
					<h1 class="life">Life's More Fun With Colour!</h1>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content();?>

					<?php endwhile;?>
					<?php else: ?>
				     
				     <?php endif; ?>
				     <?php wp_reset_query(); ?>
				</article><!--
			 --><article class="content-right">
					<?php  query_posts('showposts=2&category_name=events'); ?>
   					<?php if ( have_posts() ) : ?>
					<h1 id="content-header">Latest Events</h1>
   					<?php while ( have_posts() ) : the_post(); ?>
					
					
					<div class="event-post">
	   					<?php if ( has_post_thumbnail() ) {
	              		$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'homepage-events' );
		                 echo '<a href="'. get_permalink() .'" title=" '. get_the_title() .' "><img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/></a>';
		                 }; ?>

		                 <a class="event-title" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title();?></a>
		            </div>

		             

					
					<?php endwhile;?> <a class="more-events" href="category/events/" title="See more events">See More...</a>
					<?php else: ?>
				     
				     <?php endif; ?>
				</article>
			</div>
		</section>
	</div>
</main>
</div>

<?php get_footer();?>