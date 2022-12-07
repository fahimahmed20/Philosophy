<?php 
$philosophy_video_files = get_field('source_file');
?>
<article class="masonry__brick entry format-video" data-aos="fade-up">

    <div class="entry__thumb video-image">
		<?php if($philosophy_video_files):?>
        <a href="<?php echo $philosophy_video_files; ?>?color=01aef0&title=0&byline=0&portrait=0" data-lity>
           <?php the_post_thumbnail('philosophy-image'); ?>
        </a>
		<?php endif; ?>
    </div>

    <?php get_template_part('template-parts/common/post/summary');?>

</article> <!-- end article -->