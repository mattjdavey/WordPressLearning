<?php
/*
Template Name: About
*/

    get_header();

?>
<section class="page-header page-header-xs dark">
	<div class="container">

		<h1><?php wp_title(''); ?></h1>
		
	</div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <?php
                    if (have_posts()):

                        while (have_posts()): the_post();?>
                        
                        <p><?php the_content();?></p>
                        
                        <?php 
                        endwhile;
                    endif;
                ?>
            </div>
            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>