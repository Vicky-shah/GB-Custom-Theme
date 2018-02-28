<?php get_header();?>
<section class="tickting-main">
    <div class="container">
        <div class="tickting-content clearfix">
            <div class="col-sm-7">
                <div class="tick-left-area">
                <?php 
                if (have_posts()) :
   					while (have_posts()) :
      					the_post();
                $id = get_the_ID();
                if(!empty(get_field('product_sub_heading',$id))){?>
                    <?php } ?>
                    <div class="left-carousel">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            <?php 
                            $gallery = get_field('product_image_gallery',$id);
                            if( $gallery ):
                            $count1 = 0; 
                            foreach ($gallery as $singleImage){
                            	$imgurl = $singleImage['url'];
                            	$alt = $singleImage['alt'];
                            	if($count1 == 0){
                            		$active = 'active';
                            	} else {
                            		$active = '';
                            	}
                                echo '<li data-target="#carousel-example-generic" data-slide-to="'.$count1.'" class="'.$active.'"><div class="car-indi"><img src="'.$imgurl.'" class="img-responsive" alt="'.$alt.'"></div></li>';
                                 $count1++;}
                                 endif; ?>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                           	<?php  if( $gallery ): 
                           	$count = 0;
                            foreach ($gallery as $singleImage){
                            	$imgurl = $singleImage['url'];
                            	$alt = $singleImage['alt'];
                            	if($count == 0){
                            		$active = 'active';
                            	} else {
                            		$active = '';
                            	}
                                echo '<div class="item '.$active.'">
                                    <img src="'.$imgurl.'" class="img-responsive" alt="'.$alt.'">
                                </div>';
                                $count++;}
                                 endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $cont = the_content();
                                           $f_post_content = wpautop( $cont, true );
                                           echo $f_post_content; ?>
                    <a class="btn btn-green" href="<?php echo get_home_url();?>/quote/">Get a quote now</a>
                    <a class="home_link_inner" href="<?php echo get_home_url();?>">Back to guardian booth home page</a>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="tick-rit-area clearfix">
                  <ul>
                  <?php // check if the repeater field has rows of data
					if( have_rows('all_features') ):
						// loop through the rows of data
						$count =1;
				    while ( have_rows('all_features') ) : the_row();?>
                      <li>
                          <div class="tickt-ul">
                              <span><i class="fa ticket-icon" style="background-image:url('<?php the_sub_field('icon',$id);?>');"></i></span>
                              <div class="tick-para">
                                  <h3><?php the_sub_field('heading',$id);?></h3>
                                  <?php the_sub_field('description',$id);?>
                              </div>
                          </div>
                      </li>
                      <?php 
                      $count++;
                     	 endwhile;
                     		 else :
                      		// no rows found
                      			endif; ?>
                  </ul>
                    <div class="tick-ul-btn">
                        <a class="btn btn-green" href="<?php echo get_home_url();?>/booth-pricing/">Customize your booth</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-main">
    <div class="container">
        <div class="features-data tickiting-posts">
            <h2>Recommended Features</h2>
            <div class="row">
            <?php // check if the repeater field has rows of data
          if( have_rows('features_list') ):
            // loop through the rows of data
            while ( have_rows('features_list') ) : the_row();
                  $singleFeature = get_sub_field('post_id',$id);
            			$singlePost = get_post($singleFeature); 
            			$post_thumbnail_array = get_post_image_url_alt($singleFeature);?>
            			 <div class="col-md-6">
                    <div class="feature-single-post short-feature clearfix">
                        <div class="fetre-left-content">
                            <div class="feature-post-img">
                                <img src="<?php echo $post_thumbnail_array[0];?>" class="img-responsive" alt="<?php echo $post_thumbnail_array[1];?>">
                                <div class="overlay-text">
                                    <p><?php echo get_the_title($singleFeature);?></p>
                                </div>
                            </div>
                            <div class="feture-left-ul">
                                <div class="benift-por list-por appli-content">
                                    <h3>Benefits</h3>
                                    <?php the_sub_field('feature_description',$id);;?>
                                </div>
                                <div class="feature-rit-btn">
                                    <a class="expend" href="#">Expand <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <!-- <a class="btn btn-green" href="#">Add this Feature</a> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>	
            		<?php 
                       endwhile;
                         else :
                          // no rows found
                            endif; ?>
            	<div class="button-all-feature">
            		<a class="text-green" href="<?php echo get_home_url();?>/booth-features/">All Features</a>
            	</div>
            </div>
        </div>
    </div>
</section>
<?php $faq = get_field('faq_list',$id);
          if(!empty($faq)){ ?>
<section class="faqs-main">
  <div class="container">
      <div class="faq-content">
          <h2>FAQ’s</h2>
          <div class="faq-collap">
          <?php
          	$count = 0;
          	foreach ($faq as $singleFaq) {
          		$title = get_the_title($singleFaq);
          		$content_post = get_post($singleFaq);
				$content = $content_post->post_content;
				if($count == 0){
					$active ='active';
				}else {
					$active ='';
				}
          		echo '<div class="faq-sngl">
                  <div class="collap-data '.$active.'">
                      <h4>'.$title.'<span><i class="fa fa-angle-down" aria-hidden="true"></i></span></h4>
                      <p>'.$content.'.</p>
                  </div>
              </div>';
          	$count++;} ?>
          
          </div>
      </div>
  </div>
</section>
<?php }
          ?>
<section class="tick-testimonial">
    <div class="container">
        <?php
    $post_number = get_field('number_of_testimonial',get_the_ID());
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => $post_number
    );
    $testimonial_query = new WP_Query( $args );
?>
<div class="slider">
    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri();?>/images/quote.png" alt="">
    <?php if(!empty(get_field('testimonial_section_title',get_the_ID()))){?>
        <h2 class="testi-title"><?php the_field('testimonial_section_title',get_the_ID());?></h2>
    <?php }?>
    <div class="slidr-stars star-5">
        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
    </div>
    <div id="carousel-example-generic-2" class="carousel slide" data-ride="">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $count1 = 0;
                while ( $testimonial_query->have_posts() ) {
                    $testimonial_query->the_post();
                    if($count1 == 1){
                        $ativeClass='active';
                    }else {
                        $ativeClass='';
                    }
                    echo '<li data-target="#carousel-example-generic-2" data-slide-to="'.$count.'" class="'.$ativeClass.'"></li>';
                /* Restore original Post Data */
                wp_reset_postdata();
                $count1++;} ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            $count = 0;
            while ( $testimonial_query->have_posts() ) {
                $testimonial_query->the_post();
                $post_thumbnail_array = get_post_image_url_alt(get_the_ID());
                $title = get_the_title();
                $content = get_the_content();
                $permalink = get_the_permalink();
                if($count == 1){
                    $ativeClass='active';
                } else {
                    $ativeClass='';
                }
                echo '<div class="item '.$ativeClass.'">
                <div class="slider-data carousel-caption">
                    <p>'.$content.'</p>
                    <div class="slider-man-info">
                        <span><img src="'.$post_thumbnail_array[0].'" class="img-responsive" alt="'.$post_thumbnail_array[1].'"></span>
                        <h5>'.$title.'</h5>
                    </div>
                </div>
            </div>';
                /* Restore original Post Data */
                wp_reset_postdata();
                $count++;} ?>
        </div>

        <!-- Wrapper for slides -->

        <a class="left carousel-control" href="#carousel-example-generic-2" role="button" data-slide="prev">
            <span class="fa left-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic-2" role="button" data-slide="next">
            <span class="fa right-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span></a>
    </div>
</div>
    </div>
</section>
<section class="get-quote">
    <h6>Guardian Booth</h6>
    <h2><?php the_field('call_to_action_title',$id);?></h2>
    <a href="<?php the_field('call_to_action_button_1_link',$id);?>" class="btn btn-white get-quote-btn"><?php the_field('call_to_action_button_1',$id);?></a>
    <!-- <a href="<?php //the_field('call_to_action_button_2_link',$id);?>" class="btn btn-white get-quote-btn"><?php //the_field('call_to_action_button_2',$id);?></a> -->
</section>
<?php 
endwhile;
endif;
get_footer();?>