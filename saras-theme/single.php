<?php
	get_header();
	if ( have_posts() ) {
		while (have_posts() ) {
			the_post();

			if ( has_post_thumbnail() ) {
				get_template_part('content-templates/post', 'with-featured-image');
			} else {
				get_template_part('content-templates/post', '');
			}	
		}	
	} else {
		_e('Sorry, could not find that post for you.', 'saras-theme');
	}

	get_footer();
?>