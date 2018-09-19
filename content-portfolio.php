<div class="row">
    <div class="col-md-4">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="thumbnail-img"><?php the_post_thumbnail(); ?></div>
        <?php endif; ?>
    </div>
    <div class="col-md-8">
        <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
        <small>Posted on: 
        <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in 
        <?php echo smarty_get_terms( $post->ID, 'field' ); ?>
        <?php if (smarty_get_terms($post->ID, 'software') != null) { echo ' || ' . smarty_get_terms( $post->ID, 'software' ); }  ?>
        <?php 
            if ( current_user_can('manage_options') ) {
                echo ' || ';
                edit_post_link();
            }
        ?>
        </small>

        <hr />
        
        <?php the_excerpt(); ?>
    </div>    
</div>
<hr />