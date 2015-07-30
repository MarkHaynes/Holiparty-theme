<?php 
/*
Template Name: Custom Events Page
*/
get_header(); ?>
<div class="wrapper">
<main id="main-content">
	<?php get_template_part('promo-bar'); ?>	
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