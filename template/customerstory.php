<?php
/*
Template Name:customerstory
*/
?>
<?php get_header(); ?>
</header>
  
<div class="c-layout-page c-layout-page-fixed secondary-page">

    <?php
        // check if the flexible content field has rows of data
        if( have_rows('modules') ):

            // loop through the rows of data
            while ( have_rows('modules') ) : the_row();
				if( get_row_layout() == 'hero_banner' ):
					
					$customer_name = get_sub_field('customer');
					$title = get_sub_field('title');
					$background_img = get_sub_field('background_image');

					$style_bg = '';
					if ($background_img):
						$style_bg = 'style="background-image: url(' . $background_img['url'] . ')"';
					endif;
					
					echo '<div class="c-content-box banner"' . $style_bg . '>';
					echo '<div class="container">';
					echo '<div class="customerstory-header">';
					if ($customer_name):                    
						echo '<h5>' . $customer_name . '</h5>';
					endif;
					if ($title):
						echo '<h2>' . $title . '</h2>';
					endif;

					echo '</div>';
					echo '</div>';
					echo '</div>';	
					
				endif;

				if( get_row_layout() == 'company_profile' ):
					$company_name = get_sub_field('name');
					$logo = get_sub_field('logo');
					$details = get_sub_field('details_repeater');

					echo '<div class="c-content-box c-size-md">';
					echo '<div class="container">';
					echo '<div class="row">';
					echo '<div class="col-sm-12">';
					
					echo '<div class="customerProfile clearfix">';
					echo '<div class="col-sm-4 customerProfile__col">';
					if ($company_name):
						echo '<h3 class="highlight highlight--lightBlue">' . $company_name . '</h3>';
					endif;

					if ($logo):
						echo '<img src="' . $logo['url'] . '">';
					endif;					
					echo '</div>';

					if ($details):
						echo '<div class="col-sm-8 customerProfile__col">';

						while ( have_rows('details_repeater') ) : the_row();
							$info_title = get_sub_field('info_title');
							$info_value = get_sub_field('info_value');

							echo    '<div class="customerProfile-info">' .
										'<div>' . $info_title . '</div>' .
										'<div class="customerProfile-info__value">' . $info_value . '</div>' .
									'</div>';
						endwhile;
						echo '</div>';
					endif;
					
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					
				endif;

				if ( get_row_layout() == 'customer_story_body' ):
					$body = get_sub_field('body');
					if ( $body && have_rows('body') ):

						echo '<div class="c-content-box c-size-md">';
						echo '<div class="container">';
						echo '<div class="row">';
						echo '<div class="col-sm-12 customerArticle">';
			
						while ( have_rows('body') ): the_row();				
							if ( get_row_layout() == 'description_paragraph' ):
								$description = get_sub_field('description_paragraph');
								echo '<div class="customerArticle-intro">' . $description . '</div>';
							endif;
			
							if ( get_row_layout() == 'title' ):
								$title = get_sub_field('title_content');
								echo '<h3>' . $title . '</h3>';
							endif;
			
							if ( get_row_layout() == 'paragraph' ):
								$context = get_sub_field('paragraph_body');
								echo $context;
							endif;
			
							if ( get_row_layout() == 'quote' ):
								echo '<div class="c-quote c-background--gray">';
								$content = get_sub_field('content');
								$signature = get_sub_field('signature');
								if ($content):
									echo '<div class="c-quote__content">' . $content . '</div>';
								endif;
								if ($signature):
									echo '<div class="c-quote__signature">' . $signature . '</div>';
								endif;
								echo '</div>';
							endif;
			
							if ( get_row_layout() == 'cta'):
								echo '<div class="customerArticle-CTA">';
								$cta_title = get_sub_field('cta_title');
								$cta_link = get_sub_field('cta_link');
								$cta_link_type = get_sub_field('cta_link_type');
			
								if ($cta_title):
									echo '<h2>' . $cta_title . '</h2>';
								endif;
								
								if ($cta_link):
									switch ($cta_link_type) {
										case 'green' :
												echo '<a class="btn btn-xlg c-btn-green c-margin-t-20" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
														$cta_link['title'] .
													'</a>';
												break;
										case 'blue' :
												echo '<a class="btn btn-xlg c-theme-btn c-margin-t-20" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
														$cta_link['title'] .
													'</a>';
												break;
										case 'white' :
												echo '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
														$cta_link['title'] .
													'</a>';
												break;
										case 'link' :
												echo '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
														$cta_link['title'] .
													'</a>';
												break;
										default: break;
									}
								endif;					
								echo '</div>';
							endif;
						endwhile;
			
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					endif;
				endif;

				if ( get_row_layout() == 'about_customer' ):
					$title = get_sub_field('title');
					$description = get_sub_field('description');

					echo '<div class="c-content-box c-size-md c-content-box--grey">';
					echo '<div class="container">';
					echo '<div class="row">';
					echo '<div class="col-sm-12">';

					if ($title):
						echo '<h3>' . $title . '</h3>';
					endif;

					if ($description):
						echo '<p>' . $description . '</p>';
					endif;

					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';

				endif;

				if ( get_row_layout() == 'customers_list' ):
					$title = get_sub_field('title');
					$sub_title = get_sub_field('sub_title');

					echo '<div class="c-content-box c-size-md">';
					echo '<div class="container">';
					echo '<div class="row">';
					echo '<div class="col-sm-12">';
					if ($sub_title):
						echo '<h1>' . $sub_title . '</h1>';
					endif;

					if ($title):
						echo '<h2>' . $title . '</h2>';
					endif;

					if ( get_sub_field('customer_list') ):
						echo '<div class="storyCard-list">';

						while ( have_rows('customer_list') ) : the_row();

							$type = get_sub_field('type');
							$link = get_sub_field('link');
							$image = get_sub_field('image');
							$title = get_sub_field('title');
							$subtitle = get_sub_field('sub_title');
							$description = get_sub_field('description');
							
							if ($type == 'calltoaction'):
								echo '<div class="storyCard-item CTA">' .
										'<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" width="80" height="80" />' .
										'<div class="storyCard-item-CTA-title">' . $title . '</div>';
								if ($subtitle):
									echo '<p>' . $subtitle . '</p>' .
									     '<div class="storyCard-item-CTA-link">' .
										 '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="c-redirectLink">' . $link['title'] . '</a>' .
										 '</div>';
								else :						
									echo '<div class="storyCard-item-CTA-link">' .
										 '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="btn btn-xlg c-btn-green">' . $link['title'] . '</a>' .
										 '</div>';
								endif;
								echo '</div>';
							else:
								echo '<div class="storyCard-item">' .
									 	'<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />' .
									 	'<div class="storyCard-item-title">' . $title . '</div>' .
									 	'<div class="storyCard-item-subtitle">' . $subtitle . '</div>' .
									 	'<p>' . $description . '</p>' .
									 	'<div class="storyCard-item-link">' .
									 		'<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="c-redirectLink">' . $link['title'] . '</a>' .
									 	'</div>' .
									 '</div>';
							endif;
                        
                    	endwhile;

						echo '</div>';
					endif;

					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				endif;

				if ( get_row_layout() == 'logo_list' ):
					$title = get_sub_field('title');
					$logo_list = get_sub_field('logo_list');

					echo '<div class="c-content-box c-size-md">';
					echo '<div class="container">';
					echo '<div class="row">';
					echo '<div class="col-sm-12">';

					if ($title):
						echo '<div class="logo-group-title">' . $title . '</div>';
					endif;

					if ($logo_list):
						echo '<div class="logo-group">';
						while ( have_rows('logo_list') ) : the_row();
							$logo = get_sub_field('logo');
							if ($logo):
								echo '<img class="grayscale" src="' .
									$logo['url'] . '" alt="' .
									$logo['alt'] . '" width="180" height="140" />';
							endif;
						endwhile;
						echo '</div>';
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