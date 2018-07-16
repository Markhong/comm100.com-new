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
    <div class="c-content-box c-size-md">
        <div class="container">
            <div class="row">
                

                <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('page_flexible_content') ):

                        // loop through the rows of data
                    while ( have_rows('page_flexible_content') ) : the_row();
                         

                        // check current row layout
                        if( get_row_layout() == 'page_title_group' ):
                            echo '<div class="col-sm-12">';
                            $page_tag = get_sub_field('page_tag');
                            $page_h1 = get_sub_field('page_h1');
                            $page_subtitle = get_sub_field('page_subtitle');
                            $page_description = get_sub_field('page_description');

                            if ($page_tag):
                                echo '<div class="product-item__tag product-item__tag--large product-item__tagBlue c-margin0auto c-margin-b-20">' .
                                        $page_tag .
                                    '</div>';
                            endif;
                            if ($page_h1):
                                echo '<h1>' .
                                        $page_h1 .
                                    '</h1>';
                            endif;
                            if ($page_subtitle):
                                echo '<p class="subtitle">' .
                                        $page_subtitle .
                                    '</p>';
                            endif;
                            if ($page_description):
                                echo '<p class="desc">' .
                                        $page_description .
                                    '</p>';
                            endif;
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
                echo '<div class="c-content-box c-size-md">';
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-sm-12 callToAction">';
                $calltoaction_title = get_sub_field('calltoaction_title');
                $calltoaction_subtitle = get_sub_field('calltoaction_subtitle');
                $calltoaction_link = get_sub_field('calltoaction_link');

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
</div>

<?php get_footer(); ?>