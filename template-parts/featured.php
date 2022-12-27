<?php
$arr = array(
    'meta_key' => 'fetured_posts',
    'meta_value' => '1',
    'posts_per_page' => 3,
	'order' => 'DESC',
	'orderby' => 'title'
);
$philosophy_arr = array();
$loop = new WP_Query( $arr );

while ( $loop->have_posts() ) {
    $loop->the_post(); 
	$categories = get_the_category();
    $philosophy_arr[] = array(
        'title' => get_the_title(),
        'date'  => get_the_date(),
        'thumbnail' => get_the_post_thumbnail_url(get_the_id(),'large'),
        'author' => get_the_author_meta('display_name'),
		'link' => get_the_permalink(),
		'author_link' => get_author_posts_url(get_the_author_meta('ID')),
		'admin_image' => get_avatar_url(get_the_author_meta('ID')),
		'cat' => $categories[0]->name
    );
} 

?>

<div class="pageheader-content row">
	<div class="col-full">

		<div class="featured">

			<div class="featured__column featured__column--big">
				<div class="entry" style="background-image:url('<?php echo $philosophy_arr[0]['thumbnail'] ;?>');">

					<div class="entry__content">
						<span class="entry__category"><a href="<?php ?>"><?php echo $philosophy_arr[0]['cat'] ;?></a></span>

						<h1><a href="<?php echo $philosophy_arr[0]['link'] ?>" title=""><?php echo $philosophy_arr[0]['title'] ;?></a></h1>

						<div class="entry__info">
							<a href="#0" class="entry__profile-pic">
								<img class="avatar" src="<?php echo $philosophy_arr[0]['admin_image'] ?>" alt="">
							</a>

							<ul class="entry__meta">
								<li><a href="<?php echo $philosophy_arr[0]['author_link'] ?>"><?php echo $philosophy_arr[0]['author'] ?></a></li>
								<li><?php echo $philosophy_arr[0]['date'] ?></li>
							</ul>
						</div>
					</div> <!-- end entry__content -->

				</div> <!-- end entry -->
			</div> <!-- end featured__big -->

			<div class="featured__column featured__column--small">
				<?php
	for( $i = 1; $i < 3 ; $i++)	{
				?>
				<div class="entry" style="background-image:url('<?php echo $philosophy_arr[$i]['thumbnail'] ;?>');">
					<div class="entry__content">
						<span class="entry__category"><a href="#0"><?php echo $philosophy_arr[$i]['cat'] ;?></a></span>

						<h1><a href="#0" title=""><?php echo $philosophy_arr[$i]['title'] ;?></a></h1>

						<div class="entry__info">
							<a href="#0" class="entry__profile-pic">
								<img class="avatar" src="<?php echo $philosophy_arr[$i]['admin_image'] ?>" alt="">
							</a>

							<ul class="entry__meta">
								<li><a href="<?php echo $philosophy_arr[$i]['author_link']; ?>"><?php echo $philosophy_arr[0]['author'] ?></a></li>
								<li><?php echo $philosophy_arr[$i]['date'] ?></li>
							</ul>
						</div>
					</div> <!-- end entry__content -->
				</div> <!-- end entry -->
				<?php
	}
				?>
			</div> <!-- end featured__small -->
		</div> <!-- end featured -->

	</div> <!-- end col-full -->
</div> <!-- end pageheader-content row -->