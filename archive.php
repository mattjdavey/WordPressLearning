<?php get_header(); ?>
<section class="page-header page-header-xs dark">
	<div class="container">

		<h1>Archive <?php wp_title(); ?></h1>
		
	</div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <?php
                    if (have_posts()): ?>

                        <header class="page-header">
                        <?php 
                        
                            the_archive_title('<h1 class="page-title">', '</h1>');
                            the_archive_description('<div class="taxonomy-description">', '</div>');

                        ?>
                        </header>

                        <?php while (have_posts()): the_post();?>

                        <?php get_template_part('content', 'archive'); ?>
                        
                        <?php 
                        endwhile; ?>

                        <div class="col-sm-12 text-center">
                            <?php the_posts_navigation(); ?>
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