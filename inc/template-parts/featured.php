<?php
$arr = array(
    'meta_key' => 'fetured_posts',
    'meta_value' => '1',
    'posts_per_page' => 3
);
$philosophy_arr = array();
$loop = new WP_Query( $arr );
while ( $loop->have_posts() ) {
    $loop->the_post(); 

    $philosophy_arr[] = array(
        'title' => get_the_title(),
        'date'  => get_the_date(),
        'thumbnail' => get_the_post_thumbnail_url('large'),
        'author' => get_the_author_meta('display_name'),
    );
} 
?>

<div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url('<?php echo $philosophy_arr[0]['thumbnail'] ;?>');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Music</a></span>

                                <h1><a href="#0" title=""><?php echo $philosophy_arr[0]['title'] ;?></a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo get_template_directory_uri() ;?>/assets/images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">John Doe</a></li>
                                        <li>December 29, 2017</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">

                        <div class="entry" style="background-image:url('<?php echo get_template_directory_uri() ;?>/assets/images/thumbs/featured/featured-watch.jpg');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Management</a></span>

                                <h1><a href="#0" title="">The Pomodoro Technique Really Works.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo get_template_directory_uri() ;?>/assets/images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">John Doe</a></li>
                                        <li>December 27, 2017</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                        <div class="entry" style="background-image:url('<?php echo get_template_directory_uri() ;?>/assets/images/thumbs/featured/featured-beetle.jpg');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">LifeStyle</a></span>

                                <h1><a href="#0" title="">Throwback To The Good Old Days.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo get_template_directory_uri() ;?>/assets/images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">John Doe</a></li>
                                        <li>December 21, 2017</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->