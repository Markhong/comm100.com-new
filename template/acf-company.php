<?php
/*
Template Name:acf Company
*/
?>
<?php get_header(); ?>
    <div class="c-navbar--secondary visible-md">
        <div class="container">
            <?php
            $defaults = array(
                'theme_location'  => 'company',
                'menu'            => '',
                'container'       => 'nav',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'clearfix',
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
        </div>
    </div>
</header>
  
<div class="c-layout-page c-layout-page-fixed primary-page">
    

    <?php
        // check if the flexible content field has rows of data
        if( have_rows('modules') ):

            // loop through the rows of data
        while ( have_rows('modules') ) : the_row();
            if( get_row_layout() == 'hero_head' ):
                    
                $header_align = get_sub_field('align');
                $header_headline = get_sub_field('h1_title');
                $header_slogan = get_sub_field('subtitle');
                $header_image = get_sub_field('image');
                $header_description = get_sub_field('description');

                echo '<div class="c-content-box c-size-md">';
                echo '<div class="container header header--' . $header_align . '">';
                echo '<div class="row">';
                echo '<div class="col-sm-12">';

                
                if ($header_headline):
                    echo '<h1>' .
                            $header_headline .
                        '</h1>';
                endif;
                if ($header_slogan):
                    echo '<h2>' .
                            $header_slogan .
                        '</h2>';
                endif;
                if ($header_image):
                    echo '<img class="comm100-logo" src="' . $header_image['url'] . '" alt="' . $header_image['alt'] . '" width="430" height="267">';
                endif;
                if ($header_description):
                    echo '<p class="desc">' .
                            $header_description .
                        '</p>';
                endif;
                
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            endif;      

            // check current row layout
            if( get_row_layout() == 'image_text_quote' ):
                
                // check if the nested repeater field has rows of data
                if( have_rows('image_text_column_repeater') ):
                    
                    echo '<div class="c-content-box c-size-md">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12">';
                        // loop through the rows of data
                    while ( have_rows('image_text_column_repeater') ) : the_row();

                        $headline = get_sub_field('title');
                        $body = get_sub_field('description');
                        $image = get_sub_field('image');
                        $image_position = get_sub_field('image_position');
                        $cta = get_sub_field('cta');
                        $pull6 = '';
                        $push6 = '';
                        if ($image_position == 'right') :
                            $pull6 = 'col-sm-pull-6';
                            $push6 = 'col-sm-push-6';
                        endif;
                        $linkcontent = '';

                        if ($cta):
                            while ( have_rows('cta') ) : the_row();
                                $cta_link_type = get_sub_field('cta_link_type');
                                $cta_link = get_sub_field('cta_link');
                                if ($cta_link):
                                    switch ($cta_link_type) {
                                        case 'green' :
                                                $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'blue' :
                                                $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'white' :
                                                $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'link' :
                                                $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        default: break;
                                    }
                                endif;
                            endwhile;
                            if ($linkcontent !== ''):
                                $linkcontent = '<div class="img-text-column__link"> ' . $linkcontent . ' </div>';
                            endif;
                        endif;

                        $quote = get_sub_field('quote');
                        $quoteContent = '';
                        if ($quote):
                            while ( have_rows('quote') ) : the_row();
                                $name = get_sub_field('name');
                                $content = get_sub_field('content');
                                $quoteContent = '<div class="simple-quote">' . 
                                                    '<div class="simple-quote__name">' . $name . '</div>' . 
                                                    '<div class="simple-quote__content">' . $content . '</div>' .
                                                '</div>';
                            endwhile;
                        endif;

                        echo    '<div class="img-text-quote">' . 
                                    '<div class="img-text-column img-text-column--' . $image_position . ' clearfix">' .
                                        '<div class="col-sm-6 ' . $push6 . ' img-text-column__img simple-img">' .
                                            '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" width="300" height="300" />' .
                                        '</div>' .
                                        '<div class="col-sm-6 ' . $pull6 . ' img-text-column__text">' .
                                            '<h3>' . $headline . '</h3>' .
                                            $body .
                                        '</div>' .
                                    '</div>' .
                                    $quoteContent .
                                '</div>';
                    endwhile;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                endif;

               
            endif;    

            // check current row layout
            if( get_row_layout() == 'resource_card_group' ):
                $title = get_sub_field('title');
                // check if the nested repeater field has rows of data
                if( have_rows('resource_repeater') ):
                    
                    echo '<div class="c-content-box c-size-md c-content-box--grey">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12">';
                        // loop through the rows of data
                    if ($title):
                        echo '<h3 class="top-resources">' . $title . '</h3>';
                    endif;
                    echo '<div class="resourceCard-group">';
                    while ( have_rows('resource_repeater') ) : the_row();
                        
                        $title = get_sub_field('title');
                        $type = get_sub_field('type');
                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                        $linkcontent = '';

                        if ($link):
                            $linkcontent = '<div class="resourceCard-item-link">' .
                                    '<a class="c-redirectLink" href="' . $link['url'] . '" target="' . $link['target'] . '">' .
                                        $link['title'] .
                                    '</a>' .
                                '</div>';
                        endif;
                        
                        echo    '<div class="resourceCard-item">' .
                                    '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />' .
                                    '<div class="resourceCard-item-tag">' . $type . '</div>' .
                                    '<h5 class="resourceCard-item-title">' . $title . '</h3>' .
                                    $linkcontent .
                                '</div>';
                    endwhile;

                    echo '</div>';
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