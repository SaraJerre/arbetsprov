		<section class="content">	
			<article class="page with-featured-image">
				<div class="featured-image">
					<img src="<?php the_post_thumbnail_url('page-featured-image'); ?>">
				</div>
				<h1 class="the-title"><?php the_title(); ?></h1>
				<main class="the-content">
					<?php the_content(); ?>
				</main>
			</article>
		</section>