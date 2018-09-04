<?php get_header(); ?>

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

                        <?php get_template_part('content', 'blog'); ?>
                        
                        <?php 
                        endwhile; ?>

                        <div class="col-xs-6 text-left">
                            <?php next_posts_link('<< Older Posts') ?>
                        </div>

                        <div class="col-xs-6 text-right">
                            <?php previous_posts_link('Newer Posts >>') ?>
                        </div>

                    <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>