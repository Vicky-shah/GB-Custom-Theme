<?php /* Template Name: Quote */
get_header(); 
if(isset($_REQUEST['size'])){
    $selected = $_REQUEST['size'];
}
if(isset($_REQUEST['product_list'])){
    $productSelect = $_REQUEST['product_list'];
}
if(isset($_REQUEST['fet'])){
$selectedFeature = $_REQUEST['fet'];
}?>
   <section class="quote-section page-quote">
        <div class="container">
            <div class="col-md-6">
                <ul class="features-list">
                    <?php
                    if(get_field('list_section', 393)):
                        while(has_sub_field('list_section', 393)):
                          // display a sub field value
                            $img  = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $description= get_sub_field('description');
                            echo '<li class="media">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="'.$img.'" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <h4 class="media-heading">'.$title.'</h4>
                                        '.$description.'
                                    </div>
                                  </li>';
                            endwhile;
                        endif; ?>
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
                                $id = 'product-'.get_the_ID();
                                if($productSelect == $id){$selectThis = 'selected="selected"';}else {$selectThis ='';}
                                    echo '<option value="'.$title.'" '.$selectThis.'>'.$title.'</option>';
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
                                $id = get_the_ID();
                                if(isset($_REQUEST['fet'])){
                                	if(in_array($id, $selectedFeature)){
                                		$selectThisFeature= 'true';
                                	} else {
                                		$selectThisFeature= 'false';
                                	}
                                	if($selectThisFeature == 'true'){
                                		$addSelected = 'selected="selected"';
                                	}else {
                                		$addSelected ='';
                                	}
                            	} else {
                            		$addSelected ='';
                            	}
                                	echo '<option value="'.$title.'" '.$addSelected.'>'.$title.'</option>';
                                  } ?>
                                </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control fsize" required="required">
                            <option>Booth Size</option>
                            <option value="4x4" <?php if($selected == '4×4'){echo 'selected="selected"';}?>>4x4</option>
                            <option value="4x6" <?php if($selected == '4×6'){echo 'selected="selected"';}?>>4x6</option>
                            <option value="6x6" <?php if($selected == '6×6'){echo 'selected="selected"';}?>>6x6</option>
                            <option value="6x8" <?php if($selected == '6×8'){echo 'selected="selected"';}?>>6x8</option>
                            <option value="8x8" <?php if($selected == '8×8'){echo 'selected="selected"';}?>>8x8</option>
                            <option value="8x10" <?php if($selected == '8×10'){echo 'selected="selected"';}?>>8x10</option>
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
                    <!-- <div class="form-group">
                        <select class="form-control">
                            <option>Lead Time</option>
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control fzip" placeholder="Delivery Zip Code*" required="required">
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

<?php get_footer();?>