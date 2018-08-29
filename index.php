<?php get_header();?>
<section>
    <div class="container">
<?php

if (have_posts()):

    while (have_posts()): the_post();?>
		
		<?php get_template_part('content', get_post_format()); ?>

		<?php endwhile;

endif;

?>
	</div>
</section>
<?php get_sidebar();?>
<?php get_footer();?>