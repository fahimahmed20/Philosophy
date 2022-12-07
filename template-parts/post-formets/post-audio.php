<?php 
$philosophy_audio_files = get_field('source_file');
?>
<article class="masonry__brick entry format-audio" data-aos="fade-up">
	

    <div class="entry__thumb">
        <a href="<?php the_permalink();?>" class="entry__thumb-link">
            <?php the_post_thumbnail('philosophy-image');?>
        </a>
		<?php if($philosophy_audio_files) : ?>
        <div class="audio-wrap">
            <audio id="player" src="<?php echo $philosophy_audio_files; ?>" width="100%" height="42" controls="controls"></audio>
        </div>
		<?php endif; ?>
    </div>

    <?php get_template_part('template-parts/common/post/summary');?>

</article> <!-- end article -->