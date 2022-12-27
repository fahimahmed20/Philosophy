<!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3><?php esc_html('Popular Posts','philosophy'); ?></h3>

                <div class="block-1-2 block-m-full popular__posts">
					<?php
					 $query = new WP_Query( array(
						'orderby' => 'comment_count',
						'posts_per_page' => 6,
						'ignore_sticky_posts' => 1
					) );
					while($query-> have_posts()): $query-> the_post();
					?>
                    <article class="col-block popular__post">
                        <a href="<?php the_permalink(); ?>" class="popular__thumb">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span><?php esc_html('By','philosophy'); ?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author_meta('display_name'); ?></a></span>
                            <span class="popular__date"><span><?php esc_html('on','philosophy'); ?></span> <time><?php echo get_the_date(); ?></time></span>
                        </section>
                    </article>
 					<?php endwhile; 
					wp_reset_postdata();
					?>
                    
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
				<?php 
				if(is_active_sidebar('footer_top_right')){
					dynamic_sidebar( 'footer_top_right' );
				}
				?>

            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3><?php echo esc_html('Tags','philosophy');?></h3>

                <div class="tagcloud">
                    <?php the_tags('','',''); ?>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
					<?php 
					if(is_active_sidebar('footer_widget_one')){
						dynamic_sidebar('footer_widget_one');
					}
					?>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">

					<?php 
					if(is_active_sidebar('footer_widget_two')){
						dynamic_sidebar('footer_widget_two');
					}
					?>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">

					<?php 
					if(is_active_sidebar('footer_widget_three')){
						dynamic_sidebar('footer_widget_three');
					}
					?>

                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        <?php 
						if(is_active_sidebar('footer_widget_four')){
							dynamic_sidebar('footer_widget_four');
						}
						?>
<!--                     <h4>Our Newsletter</h4>

                    <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div> -->

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        
						 <?php 
						if(is_active_sidebar('footer_widget_soket')){
							dynamic_sidebar('footer_widget_soket');
						}
						?>
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <?php wp_footer();?>
</body>

</html>