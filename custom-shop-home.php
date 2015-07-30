<?php 
/*
Template Name: Custom Shop Home
*/
get_header(); ?>
<div class="wrapper">
	<main id="main-content">
		<?php
			$args = array(
			  'orderby' => 'name',
			  'parent' => 0
			  );
			$categories = get_categories( $args );
			foreach ( $categories as $category ) {
			    echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br />';
			}
		?>
		
	</main>
</div>

<?php get_footer();?>