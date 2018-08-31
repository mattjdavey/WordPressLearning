<?php
/*
Template Name: Home
*/

    get_header();

?>

<div class="slider fullwidthbanner-container roundedcorners">
    <div class="fullwidthbanner" data-height="600" data-shadow="0" data-navigationStyle="preview2">
        <ul class="hide">        
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="10000" data-saveperformance="off" data-title="Slide 1" style="background-color: #F6F6F6;">

                <img src="https://source.unsplash.com/vP5Im4q8Z6g/1920x1000" alt="video" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat">        
            </li>
        </ul>
        <div class="tp-bannertimer"><!-- progress bar --></div>
    </div>
</div>

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