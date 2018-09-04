<?php 
/*
    Template Name: Blog
*/

get_header();

?>
<!-- 
	PAGE HEADER 
	
	CLASSES:
		.page-header-xs	= 20px margins
		.page-header-md	= 50px margins
		.page-header-lg	= 80px margins
					.page-header-xlg= 130px margins
		.dark		= dark page header
		.light		= light page header
-->
<section class="page-header page-header-xs">
	<div class="container">

		<h1>PAGE TITLE</h1>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Features</a></li>
			<li class="active">Page Title</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>
<!-- /PAGE HEADER -->

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