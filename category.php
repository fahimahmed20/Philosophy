<?php get_header(); ?>


    <!-- s-content
    ================================================== -->
    <section class="s-content">
		<div class="row narrow">
			<div class="col-full s-content__header" data-aos="fade-up">
				<h1><?php single_cat_title(); ?></h1>

				<p class="lead"><?php echo category_description(); ?></p>
			</div>
		</div>
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
					<?php if(!have_posts()):?>
					<h2 style="text-align:center;line-height:0;">No post in this category</h2>
                <?php 
				endif;
                while(have_posts()):
                    the_post();
                get_template_part('template-parts/post-formets/post',get_post_format());
                
                endwhile;
                ?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
					<?php philosophy_pagi(); ?>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->


    <?php get_footer();?>