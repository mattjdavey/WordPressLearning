<?php
/*
Template Name: About
*/

    get_header();

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <?php
                    if (have_posts()):

                        while (have_posts()): the_post();?>

                        <h3><?php the_title();?> </h3>
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