<?php get_header();?>
    <section class="companies-logos">
    <h3 class="hidden">logos</h3>
        <div class="container">
            <div class="row">
            <?php if(!empty(get_field('client_section_title',get_the_ID()))){
                $column = 'col-lg-8 col-lg-offset-1';?>
                <div class="col-lg-3">
                        <h2 class="marg-0"><?php the_field('client_section_title',get_the_ID());?></h2>
                </div>
                <?php } else {
                    $column = 'col-lg-12';
                    }?>
                <div class="<?php echo $column;?>">
                  <?php get_template_part('includes/loop','clients');?>
                </div>
            </div>
        </div>
    </section>
    <section class="guardian-sec">
        <div class="container">
            <div class="row guardian-row">
                <div class="col-md-5 col-lg-5 col-lg-push-7 col-md-push-7">
                    <div class="main-zoom">
                        <div class="vr-cont">
                        <img src="https://d1zywcw37aesmt.cloudfront.net/wp-content/uploads/2017/08/booth.jpg" alt="gaurdian-booth">
                           <!--  <iframe id="vrFrame" src="http://saadshah.me/gb/gb/deziner%20booth_VR.1211.html" frameborder="0" scrolling="no"
                                    allowfullscreen="allowfullscreen"></iframe> -->
                        </div>
                        <div class="boxes">
                            <div class="col-sm-2">
                                <div class="boxes-div">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-lg-pull-5 col-md-pull-5 pad-0">
                    <div class="guardian-left-content">
                        <div class="guardian-title">
                            <?php if(!empty(get_field('booth_section_title',get_the_ID()))){?>
                                <h2><?php the_field('booth_section_title',get_the_ID());?></h2>
                            <?php }?>
                        </div>
                        <div class="guardian-list-por clearfix">
                            <div class="col-xs-12 pad-0">
                                <div class="guardian-ul clearfix">
                                    <ul>
                                        <?php
                                        // check if the repeater field has rows of data
                                        if( have_rows('features') ):
                                        	$count = 0;
                                            // loop through the rows of data
                                            while ( have_rows('features') ) : the_row();
                                                // display a sub field value
                                                $icon_class  = get_sub_field('feature_icon');
                                                $title = get_sub_field('feature_title');
                                                echo '<li>
                                                    <div class="list-content">
                                                        <div class="list-icon ic-'.$count.'">
                                                            <i class="door-icon '.$icon_class.'"></i>
                                                        </div>
                                                        <div class="list-para">
                                                            <p>'.$title.'</p>
                                                        </div>
                                                    </div>
                                                </li>';
                                            $count++;
                                            endwhile;
                                        else :
                                            // no rows found
                                        endif;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-6 pad-0">
                                <div class="guardian-submit">
                                    <?php if(get_field('button_one_text')){?>
                                        <a href="<?php the_field('button_one_link');?>" class="btn btn-green"><?php the_field('button_one_text');?></a>
                                    <?php }
                                        if(get_field('text_left')){?>
                                            <p><i class="note-icon"></i> <?php the_field('text_left');?>.</p>
                                        <?php }?>
                                </div>
                            </div>
                            <div class="col-xs-6 pad-responsive-0">
                                <div class="guardian-submit">
                                    <?php if(get_field('button_two_text')){?>
                                        <a href="<?php the_field('button_two_link');?>" class="btn btn-green"><?php the_field('button_two_text');?></a>
                                    <?php }
                                    if(get_field('text_left')){?>
                                        <p><i class="note-icon"></i> <?php the_field('text_right');?>.</p>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="quote-section">
        <div class="container">
            <div class="col-md-6">
                <ul class="features-list">
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('list_section') ):
                        // loop through the rows of data
                        while ( have_rows('list_section') ) : the_row();

                            // display a sub field value
                            $img  = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $description= get_sub_field('description');
                            echo '<li class="media">
                                    <div class="media-left media-middle">
                                        <img class="media-object" src="'.$img.'" alt="">
                                    </div>
                                    <div class="media-body media-middle">
                                        <h4 class="media-heading">'.$title.'</h4>
                                        '.$description.'
                                    </div>
                                  </li>';
                        endwhile;
                    else :
                        // no rows found
                    endif;
                    ?>
                </ul>
            </div>
            <div class="col-md-6">
                <?php if(!empty(get_field('quote_form_heading',get_the_ID()))){?>
                    <h2 class="quote-title"><?php the_field('quote_form_heading',get_the_ID());?></h2>
                <?php }?>
                <form class="gb-form">
                    <div class="form-group">
                        <input type="text" class="form-control fname" placeholder="Name*" required="required">
                        <i class="glyphicon glyphicon-ok"></i>
                        <i class="glyphicon glyphicon-remove namex"></i>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control femail" placeholder="Email*" required="required" value="">
                        <i class="glyphicon glyphicon-ok"></i>
                        
                        <i class="glyphicon glyphicon-remove"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control fphone" placeholder="Phone">
                        <i class="glyphicon glyphicon-ok"></i>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control faddress" placeholder="Address" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control fproduct">
                            <option>Select Product</option>
                            <?php
                          $args = array(
                                'post_type' => 'products',
                                'posts_per_page' => -1,
                                'order' => 'DESC'
                             );
                        $products_query = new WP_Query( $args );
                                while ( $products_query->have_posts() ) {
                                $products_query->the_post();
                                $title = get_the_title();
                                    echo '<option value="'.$title.'">'.$title.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="js-example-basic-multiple ffeature" multiple="multiple">
                        <?php
                          $args = array(
                                'post_type' => 'features',
                                'posts_per_page' => -1,
                                'order' => 'DESC'
                             );
                        $features_query = new WP_Query( $args );
                                // echo '<option value="select">Please Select</option>';
                                while ( $features_query->have_posts() ) {
                                $features_query->the_post(); 
                                $title = get_the_title();
                                echo '<option value="'.$title.'">'.$title.'</option>';
                                  } ?>
                                </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control fsize" required="required">
                            <option>Booth Size*</option>
                            <option value="4x4">4x4</option>
                            <option value="4x6">4x6</option>
                            <option value="6x6">6x6</option>
                            <option value="6x8">6x8</option>
                            <option value="8x8">8x8</option>
                            <option value="8x10">8x10</option>
                            <option value="custom-size">Custom Size</option>
                        </select>
                    </div>
                    <div class="form-group cs-dimension hidden">
                        <input type="text" class="form-control cs-width" placeholder="Width">
                        <i class="glyphicon glyphicon-ok"></i>
                        <i class="glyphicon glyphicon-remove zipx"></i>
                    </div>
                    <div class="form-group cs-dimension hidden">
                        <input type="text" class="form-control cs-height" placeholder="Height">
                        <i class="glyphicon glyphicon-ok"></i>
                        <i class="glyphicon glyphicon-remove zipx"></i>
                    </div>
                 <!--    <div class="form-group">
                        <select class="form-control">
                            <option>Lead Time</option>
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control fzip" placeholder="Delivery Zip Code*" required="required">
                        <i class="glyphicon glyphicon-ok"></i>
                        <i class="glyphicon glyphicon-remove zipx"></i>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control general-message" placeholder="Message"></textarea>
                        <i class="glyphicon glyphicon-ok"></i>
                        <i class="glyphicon glyphicon-remove zipx"></i>
                    </div>

                    <button type="submit" class="btn btn-green btn-block get_quote_button">Get A Quote</button>
                </form>
            </div>
        </div>
    </section>
    <section class="solutions-section">
        <?php
        $productsSectionTitle = get_field('features_section_title',90);
         if(!empty($productsSectionTitle)){?>
            <h2 class="section-title"><?php the_field('features_section_title',90);?></h2>
        <?php }?>
        <div class="container">
            <div id="solutionCarousal" class="solutions-carousal owl-carousel">
                <?php get_template_part('includes/loop','product_home');?>
            </div>
        </div>
    </section>
    <section class="tick-testimonial">
        <div class="container">
            <?php get_template_part('includes/loop','testimonials');?>
        </div>
    </section>
    <?php /* ?>
    <section class="map-section">
        <h2 class="section-title"><?php the_field('map_section_title',get_the_ID());?></h2>
        <div class="contact-map">
        <div id="map"></div>
            <?php //the_field('map_iframe',get_the_ID());?>
        </div>

    </section>
    <?php */ ?>
<?php get_footer();?>