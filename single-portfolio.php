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

                        <h3><?php the_title();?> </h3>
                        <?php if (has_post_thumbnail() ) : ?>
                            <div class="float-right"><?php the_post_thumbnail('thumbnail'); ?></div>
                        <?php endif; ?>
                        
                        <small>
                            <?php echo smarty_get_terms( $post->ID, 'field' ); ?>
                            <?php if (smarty_get_terms($post->ID, 'software') != null) { echo ' || ' . smarty_get_terms( $post->ID, 'software' ); }  ?>                     
                            <?php 
                                if ( current_user_can('manage_options') ) {
                                    echo ' || ';
                                    edit_post_link();
                                }
                            ?>
                        </small>                     

                        <p><?php the_content();?></p>
                        
                        <hr />
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <?php previous_post_link(); ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php next_post_link(); ?>
                            </div>                            
                        </div>
                                                                   

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