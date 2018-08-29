<?php 
/*
    Template Name: Blog
*/

get_header();

?>
<section>
    <div class="container">
<?php

if (have_posts()):

    while (have_posts()): the_post();?>
		
      

		<?php endwhile;

endif;

?>
    </div>
</section>

<?php get_footer();?>