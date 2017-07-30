<?php
// Get the header
get_header();
?>
<section class="content">
	<?php
	// the loop starts here
	 if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	<article class="blog-post">
	<?php  
	if ( has_post_thumbnail() ) {
			the_post_thumbnail();
	}
	?>
		<main class="the-excerpt">
 			<h1 class="the-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
 			<?php the_excerpt(); ?>
 		</main>
 	</article>
	<?php
	// the loop ends here
	endwhile;
	else :
	    _e( 'Sorry, no posts matched your criteria.', 'saras-theme' );
	endif;
	?>
</section>
<?php
// get the footer
get_footer();
?>