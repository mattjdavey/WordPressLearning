<div class="row">
    <div class="col-md-4">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="thumbnail-img"><?php the_post_thumbnail(); ?></div>
        <?php endif; ?>
    </div>
    <div class="col-md-8">
        <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
        <small>Posted on: 
        <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php 
            $terms_list = wp_get_post_terms($post->ID, 'field'); 


            $i = 0;
            foreach ($terms_list as $term) { $i++;
                if( $i > 1 ) {
                    echo ', ';
                }
                echo $term ->name;
            }
        ?>
        <?php 
            $terms_list = wp_get_post_terms($post->ID, 'software'); 
            if ($terms_list != null) {
                echo ' || ';
            }


            $i = 0;
            foreach ($terms_list as $term) { $i++;
                if( $i > 1 ) {
                    echo ', ';
                }
                echo $term ->name;
            }
        ?>   
        </small>

        <hr />
        
        <?php the_excerpt(); ?>
    </div>    
</div>
<hr />