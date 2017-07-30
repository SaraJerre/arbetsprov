		<section class="the-img">	
			<div class="featured-image">
				<img src="<?php the_post_thumbnail_url('post-featured-image'); ?>">
			</div>
		</section>
		<section class="content">
			<article class="post with-featured-image">
				<main class="the-content">
					<h1 class="the-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</main>
			</article>
		</section>