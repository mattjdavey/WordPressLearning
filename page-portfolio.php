<?php
/*
    Template Name: Portfolio Template
*/

get_header(); ?>
<section>
    <div class="container">
        <?php

        $args = array('post_type' => 'portfolio', 'post_per_page' => 3);
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) : 
            while( $loop->have_posts() ): $loop->the_post(); ?>

                <?php get_template_part('content', 'portfolio'); ?>

            <?php endwhile;

        endif;

        ?>
    </div>
</section>

<?php get_footer(); ?>