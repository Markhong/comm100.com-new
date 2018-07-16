<?php
/*
Template Name:acf live chat home
*/
?>
<?php get_header(); ?>
  <div class="c-topbar c-navbar">
        <div class="container">
            <div class="c-brand">
                  <button class="c-search-toggler" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                  <button class="c-hor-nav-toggler" type="button" data-target=".c-top-menu">
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                  </button>
                </div>
            <!-- BEGIN: QUICK SEARCH -->
            <form class="c-quick-search" action="https://www.comm100.com/search/">
                <input type="text" name="q" placeholder="Search Comm100.com..." value="" class="form-control" autocomplete="off">
                <span class="c-theme-link">&times;</span>
            </form>
            <!-- END: QUICK SEARCH -->
           
            <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
            <?php
              $defaults = array(
                  'theme_location'  => 'primary',
                  'menu'            => '',
                  'container'       => 'nav',
                  'container_class' => 'c-top-menu c-mega-menu c-pull-right c-mega-menu-light c-mega-menu-dark-mobile c-theme c-fonts-uppercase',
                  'container_id'    => '',
                  'menu_class'      => 'nav navbar-nav c-theme-nav',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth'           => 0,
                  'walker'          => ''
                );
                wp_nav_menu( $defaults );
            ?>
            <!-- END: INLINE NAV -->
        </div>
    </div>
  <div class="c-navbar c-mainbar">
    <div class="container">
          <!-- BEGIN: BRAND -->
        <div class="c-navbar-wrapper clearfix">
            <div class="c-brand c-pull-left">
                
                  <a href="https://www.comm100.com/livechat/" class="c-logo">
                    <span class="c-logo-img"><img src="https://www.comm100.com/wp-content/uploads/images/logo-comm100.svg" alt="Comm100" class="c-desktop-logo"/></span>
                  </a>
                  
                
                <button class="c-hor-nav-toggler" type="button" data-target=".c-top2-menu">
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                </button>
                
            </div>
            <!-- END: BRAND -->
            
            <!-- BEGIN: HOR NAV -->
            <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
            <!-- BEGIN: MEGA MENU -->
            
            <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
            <?php
              $defaults = array(
                  'theme_location'  => 'livechat',
                  'menu'            => '',
                  'container'       => 'nav',
                  'container_class' => 'c-top2-menu c-mega-menu c-pull-right c-mega-menu-light c-mega-menu-dark-mobile c-theme',
                  'container_id'    => '',
                  'menu_class'      => 'nav navbar-nav c-theme-nav',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth'           => 0,
                  'walker'          => ''
                );
                wp_nav_menu( $defaults );
            ?>

          <!-- END: MEGA MENU -->
          <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
          <!-- END: HOR NAV -->
        </div>
    </div>
  </div>
</header>
<div class="c-layout-page c-layout-page-fixed">
    <?php
        // check if the flexible content field has rows of data
        if( have_rows('page_flexible_content') ):

            // loop through the rows of data
        while ( have_rows('page_flexible_content') ) : the_row();

            // check current row layout
            if( get_row_layout() == 'banner_group' ):
                
                $banner_align = get_sub_field('banner_align');
                $banner_icon = get_sub_field('banner_icon');
                // $page_tag = get_sub_field('page_tag');
                $banner_headline = get_sub_field('banner_headline');
                $banner_slogan = get_sub_field('banner_slogan');
                $banner_description = get_sub_field('banner_description');
                $banner_background_image = get_sub_field('banner_background_image');
                $banner_cta = get_sub_field('banner_cta');

                echo '<div class="c-content-box c-size-md banner banner--' . $banner_align . '" style="background-image: url(' . $banner_background_image['url'] . ')">';
                echo '<div class="container">';
                echo '<div class="col-sm-12">';

                if ($banner_icon):
                    echo '<div class="banner_icon">' .
                            '<img src="' . $banner_icon['url'] . '" alt="' . $banner_icon['alt'] . '" width="64" height="64" />' . 
                        '</div>';
                endif;
                if ($banner_headline):
                    echo '<h1>' .
                            $banner_headline .
                        '</h1>';
                endif;
                if ($banner_slogan):
                    echo '<p class="subtitle">' .
                            $banner_slogan .
                        '</p>';
                endif;
                if ($banner_description):
                    echo '<div class="desc">' .
                            $banner_description .
                        '</div>';
                endif;
                
                if ($banner_cta):

                    while ( have_rows('banner_cta') ) : the_row();
                        $banner_cta_link_type = get_sub_field('banner_cta_link_type');
                        $banner_cta_link = get_sub_field('banner_cta_link');
                        if ($banner_cta_link):
                            switch ($banner_cta_link_type) {
                                case 'green' :
                                        echo '<a class="banner_cta_link btn btn-xlg btn-link--green" href="' . $banner_cta_link['url'] . '" target="' . $banner_cta_link['target'] . '">' .
                                                $banner_cta_link['title'] .
                                            '</a>';
                                        break;
                                case 'blue' :
                                        echo '<a class="banner_cta_link btn btn-xlg c-theme-btn">' .
                                                $banner_description .
                                            '</a>';
                                        break;
                                case 'white' :
                                        echo '<a class="banner_cta_link btn btn-xlg c-btn-border-2x c-theme-btn">' .
                                                $banner_description .
                                            '</a>';
                                        break;
                                case 'link' :
                                        echo '<a class="banner_cta_link">' .
                                                $banner_description .
                                            '</a>';
                                        break;
                                default: break;
                            }
                        endif;
                    endwhile;
                    
                    
                endif;
                echo '</div>';
                echo '</div>';
                echo '</div>';
            endif;    

        endwhile;

        else :

        // no layouts found

        endif;
    ?>
    <div class="c-content-box c-size-md">
        <div class="container">
            <div class="row">
                

                <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('page_flexible_content') ):

                        // loop through the rows of data
                    while ( have_rows('page_flexible_content') ) : the_row();
                         // check current row layout
                        if( get_row_layout() == 'head_group' ):
                            
                            $header_align = get_sub_field('header_align');
                            $header_icon = get_sub_field('header_icon');
                            // $page_tag = get_sub_field('page_tag');
                            $header_headline = get_sub_field('header_headline');
                            $header_slogan = get_sub_field('header_slogan');
                            $header_description = get_sub_field('header_description');
                            $header_background_image = get_sub_field('header_background_image');
                            $header_cta = get_sub_field('header_cta');

                            echo '<div class="header header--' . $header_align . '">';
                            echo '<div class="container">';
                            echo '<div class="col-sm-12">';

                            if ($header_icon):
                                echo '<div class="header_icon">' .
                                        '<img src="' . $header_icon['url'] . '" alt="' . $header_icon['alt'] . '" width="64" height="64" />' . 
                                    '</div>';
                            endif;
                            if ($header_headline):
                                echo '<h1>' .
                                        $header_headline .
                                    '</h1>';
                            endif;
                            if ($header_slogan):
                                echo '<p class="subtitle">' .
                                        $header_slogan .
                                    '</p>';
                            endif;
                            if ($header_description):
                                echo '<div class="desc">' .
                                        $header_description .
                                    '</div>';
                            endif;
                            
                            if ($header_cta):

                                while ( have_rows('header_cta') ) : the_row();
                                    $header_cta_link_type = get_sub_field('header_cta_link_type');
                                    $header_cta_link = get_sub_field('header_cta_link');
                                    if ($header_cta_link):
                                        switch ($header_cta_link_type) {
                                            case 'green' :
                                                    echo '<a class="header_cta_link btn btn-xlg btn-link--green" href="' . $header_cta_link['url'] . '" target="' . $header_cta_link['target'] . '">' .
                                                            $header_cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    echo '<a class="header_cta_link btn btn-xlg c-theme-btn">' .
                                                            $header_description .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    echo '<a class="header_cta_link btn btn-xlg c-btn-border-2x c-theme-btn">' .
                                                            $header_description .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    echo '<a class="header_cta_link">' .
                                                            $header_description .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                                
                                
                            endif;
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        endif;    

                        // check current row layout
                        if( get_row_layout() == 'layout_feature' ):
                            $rows = get_sub_field('repeater_feature');
                            $row_count = count($rows);
                            foreach ($rows as $row) {
                                $featureImage = $row['feature_image'];
                                $featureDescription = $row['feature_description'];
                                echo '<div class="col-sm-' . strval(12/$row_count) . '">' .
                                    '<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">' .
                                        '<div class="c-icon-wrapper">' . 
                                            '<span aria-hidden="true">' .
                                                '<img src="' . $featureImage . '" alt="" width="50" height="50">' .
                                            '</span>' .
                                        '</div>' .
                                        '<p>' . $featureDescription . '</p>' .
                                    '</div>' .
                                '</div>';
                            }
                        endif;   

                        // check current row layout
                        if( get_row_layout() == 'card_group' ):
                            $rows = get_sub_field('card_repeater');
                            $row_count = count($rows);

                            // check if the nested repeater field has rows of data
                            if( have_rows('card_repeater') ):
                                
                                echo '<div class="col-sm-12 card card-col-' . $row_count . '">';

                                    // loop through the rows of data
                                while ( have_rows('card_repeater') ) : the_row();

                                    $card_themecolor = get_sub_field('card_themecolor');
                                    $card_img = get_sub_field('card_img');
                                    $card_title = get_sub_field('card_title');
                                    $card_subtitle = get_sub_field('card_subtitle');
                                    $card_description = get_sub_field('card_description');
                                    $card_link = get_sub_field('card_link');

                                    echo    '<div class="card-item card-item--' . $card_themecolor . '" data-link="' . $card_link['url'] . '">' .
                                                '<div><img src="' . $card_img['url'] . '" alt="' . $card_img['alt'] . '" width="105" height="105" /></div>' .
                                                '<h3 class="hightlight hightlight--' . $card_themecolor . '">' . $card_title . '</h3>' .
                                                '<div class="card-item__subtitle">' . $card_subtitle . '</div>' .
                                                '<p>' . $card_description . '</p>' .
                                                '<div class="card-item__link"><a href="' . $card_link['url'] . '" target="' . $card_link['target'] . '">' . $card_link['title'] . '</a></div>' . 
                                            '</div>';
                                endwhile;

                                echo '</div>';

                            endif;

                        endif;

                        // check current row layout
                        if( get_row_layout() == 'paragraph' ):
                            $paragraph_item = get_sub_field('paragraph_item');
                            $paragraph_itemClass = get_sub_field('paragraph_item')['paragraph_class'];
                            $paragraph_itemText = get_sub_field('paragraph_item')['paragraph_text'];
                            
                            echo '<div class="col-sm-12"><p class="' . $paragraph_itemClass . '">' . $paragraph_itemText . '</p></div>';

                        endif;

                        // check current row layout
                        if( get_row_layout() == 'btn_group' ):
                            $btn_group_class = get_sub_field('btn_group_class');
                            // check if the nested repeater field has rows of data
                            if( have_rows('btn_repeater') ):
                                
                                echo '<div class="col-sm-12 btn-link-group ' . $btn_group_class . '">';

                                    // loop through the rows of data
                                while ( have_rows('btn_repeater') ) : the_row();

                                    $btn_size = get_sub_field('btn_size');
                                    $btn_link = get_sub_field('btn_link');

                                    echo  '<a href="' . $btn_link['url'] . '" target="' . $btn_link['target'] . '" class="btn-link btn-link--' . $btn_size . '">' . $btn_link['title'] . '</a>';

                                endwhile;

                                echo '</div>';

                            endif;

                        endif;

                        

                    endwhile;

                    else :

                    // no layouts found

                    endif;
                ?>
                
            </div>
            
        </div>
    </div>
    <?php
        // check if the flexible content field has rows of data
        if( have_rows('page_flexible_content') ):

            // loop through the rows of data
        while ( have_rows('page_flexible_content') ) : the_row();
                
            // check current row layout
            if( get_row_layout() == 'call_to_action' ):
                
                $calltoaction_type = get_sub_field('calltoaction_type');
                $calltoaction_title = get_sub_field('calltoaction_title');
                $calltoaction_subtitle = get_sub_field('calltoaction_subtitle');
                $calltoaction_link = get_sub_field('calltoaction_link');
                $calltoaction_bg = get_sub_field('calltoaction_bg');

                echo '<div class="c-content-box c-size-md" style="background-image: url(' . $calltoaction_bg['url'] . ')">';
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-sm-12 callToAction callToAction--' . $calltoaction_type . '">';

                if ($calltoaction_title):
                    echo '<h3>' .
                            $calltoaction_title .
                        '</h3>';
                endif;
                if ($calltoaction_subtitle):
                    echo '<p class="subtitle">' .
                            $calltoaction_subtitle .
                        '</p>';
                endif;
                if ($calltoaction_link):
                    echo  '<a href="' . $calltoaction_link['url'] . '" target="' . $calltoaction_link['target'] . '" class="btn btn-xlg c-theme-btn">' . $calltoaction_link['title'] . '</a>';
                endif;
                
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            endif;    

        endwhile;

        else :

        // no layouts found

        endif;
    ?>
    <?php
        // check if the flexible content field has rows of data
        if( have_rows('page_flexible_content') ):

            // loop through the rows of data
        while ( have_rows('page_flexible_content') ) : the_row();
                
            // check current row layout
            if( get_row_layout() == 'customer_logo_carousel' ):
                
                $custom_logo_repeater = get_sub_field('custom_logo_repeater');
                // check if the nested repeater field has rows of data
                if( have_rows('custom_logo_repeater') ):
                    
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl" data-items="6" data-desktop-items="6" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="1" data-auto-play="5000">';
                    echo '<div class="owl-carousel owl-theme c-theme owl-bordered1">';            
                        // loop through the rows of data
                    while ( have_rows('custom_logo_repeater') ) : the_row();

                        $custom_logo_image = get_sub_field('custom_logo_image');

                        echo    '<div class="item">' .
                                    '<img src="' . $custom_logo_image['url'] . '" alt="' . $custom_logo_image['alt'] . '" width="180" height="140" />' .
                                '</div>';
                    endwhile;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                endif;
                
                
            endif;    

        endwhile;

        else :

        // no layouts found

        endif;
    ?>
</div>

<?php get_footer(); ?>