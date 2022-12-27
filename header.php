<!DOCTYPE html>
<html class="no-js" lang="<?php language_attributes(); ?>">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head();?>
</head>

<body id="top" <?php body_class();?>>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader <?php if(is_home()){ echo 's-pageheader--home';}?>">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
						<?php
						if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
						}else{
							bloginfo('name');
						}
						?>
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
					<?php
					$philosophy_facebook = get_field("author_facebook","user_".get_the_author_meta("ID"));
					$philosophy_twitter = get_field("author_twitter","user_".get_the_author_meta("ID"));
					?>
					<?php if($philosophy_facebook):?>
                    <li>
                        <a href="<?php echo $philosophy_facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
					<?php endif;
					if($philosophy_twitter):
					?>
                    <li>
                        <a href="<?php echo $philosophy_twitter;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
					<?php endif;?>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">
					<?php get_search_form(); ?>
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>
					<?php
					$philosophy_nav = wp_nav_menu( array(
						'theme_location' => 'primary_menu',
						'menu_class' => 'header__nav',
						'echo' => false
					) );
					$philosophy_nav = str_replace('menu-item-has-children','menu-item-has-children has-children',$philosophy_nav);
					echo $philosophy_nav;
					?>

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->
        
        <?php if(is_home()) {
            get_template_part('template-parts/featured');
        }  else{

        }
        ?>

    </section> <!-- end s-pageheader -->