<?php /* Template Name: Wizard */
get_header();
$userId = $_SESSION['user_id'];

 $postIdSession = checkUserIdExist($userId);
 if(!empty($postIdSession)){
	$name = get_the_title($postIdSession);
	$email = get_field('email_address',$postIdSession);
    $boothPrice = get_field('booth_price',$postIdSession);
    $boothColor = get_field('booth_color',$postIdSession);
    $width = get_field('booth_width',$postIdSession);
	$height = get_field('booth_height',$postIdSession);
	$boothSize = get_field('booth_size',$postIdSession);
 } else {
 	$name = '';
 	$email = '';
    $boothPrice = '';
 	$boothColor = '';
 	$width = '';
 	$height = '';
 	$boothSize = '';
 }
?>
<section class="wizard-main">
    <div class="container">

<div class="wizard-tabs">
            <!-- Nav tabs -->

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#wizard-1"  aria-controls="wizard-1" role="tab" data-toggle="tab">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </a>
                    <span> Size & Price</span>
                </li>
                <li role="presentation">
                    <a href="#wizard-2" aria-controls="wizard-2" role="tab" data-toggle="tab" class="disabled">
                        <i class="fa" aria-hidden="true"></i>
                    </a>
                    <span>Applications</span>
                </li>
                <li role="presentation">
                <a href="#wizard-4" aria-controls="wizard-4" role="tab" data-toggle="tab" class="disabled">
                        <i class="fa" aria-hidden="true"></i>
                    </a>
                        <span>Custom Features</span>
                </li>
                <li role="presentation">
                    <a href="#wizard-3" aria-controls="wizard-3" role="tab" data-toggle="tab" class="disabled">
                        <i class="fa" aria-hidden="true"></i>
                    </a>
                        <span>Color Options</span>
                </li>
                <li role="presentation">
                    <a href="#wizard-5" aria-controls="wizard-5" role="tab" data-toggle="tab" class="disabled">
                        <i class="fa" aria-hidden="true"></i>
                    </a>
                        <span>Online Pricing</span>
                </li>
            </ul>

            <!-- Tab panes -->
</br>


            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="wizard-1">
                    <p>
                        <strong><h2>Looking for Basic Booth Pricing? </h2>Scroll down for sizes & pricing information </strong>

                    </p>

                    <p>
                    <h3><strong> Want to Customize Your Booth Features and Color Options?</strong></h3>

                    <ol><li>Select your booth dimensions below.</li>
                        <li>Enter your email to save your information. </li><li>Click  "Continue  Customizing Your Booth" to see additional guard booth features, colors, and pricing.</li>

                    </ol>

                    </p>


                    <br>
                    <div class="booth-selection row">
                        <div class="col-sm-12">
                            <div class="bot-lft-por">

                             
                                <div class="sel-fields row top-inputs">
                                    <div class="col-sm-6">
                                        <input type="hidden" class="seccion-user" value="<?php echo $userId;?>">
                                        <input type="text" class="form-control wizname" placeholder="Name" value="<?php if(!empty($name)) { echo $name; }?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="wizemail" type="text" class="form-control" placeholder="Please Enter Email" value="<?php if(!empty($email)) { echo $email; }?>">
<!--                                        <p class="err">Please Enter Email</p>-->
   <div class="tab-btn clearfix">

                                 
                                    <button href="#" class="btn btn-green next call-to-save first-call-booth solid-green">Continue Customizing Your Booth </button>
                                </div>
                                    </div>
                                </div>


 <div class="wzrd-sngl-imges row">

                                    <?php
                                            $args = array(
                                                'post_type' => 'pricing',
                                                'posts_per_page' =>-1,
                                                'order' => 'ASC'
                                            ); 
                                            $pricing_query = new WP_Query( $args );
                                            $count = 0;
                                            while ( $pricing_query->have_posts() ) {
                                            $pricing_query->the_post();
                                            $id = get_the_ID();
                                            
                                            if(!empty($postIdSession)){
                                            	$title = get_the_title($id);
                                            	$size = get_field('booth_size',$postIdSession);
                                            	if($title == $size){
                                            	$active = 'active';
                                            } else {
                                            	$active = '';
                                            }
                                            }else {
                                            	if($count == 0){
                                            		$active = 'active';
                                            	} else {
                                            		$active = '';
                                            	}
                                            }
                                            $post_thumbnail_array = get_post_image_url_alt(get_the_ID());
                                            ?>
                                        <div class="col-xs-6 col-sm-4 boothsingle">
                                            <div class="botsec-sngl <?php echo $active;?>" data-price="<?php the_field('price',get_the_ID());?>">
                                                <p><?php the_title();?></p>
                                            	<img src="<?php echo $post_thumbnail_array[0]; ?>" alt="<?php echo $post_thumbnail_array[1]; ?>">
                                            	<i class="fa fa-check" aria-hidden="true"></i>
                                            	<h2><sup>$</sup><?php the_field('price',get_the_ID());?></h2>
                                        	</div>
                                        </div>
                                        <?php  /* Restore original Post Data */
                                             wp_reset_postdata();
                                             $count++;} 
                                             if(!empty($postIdSession)){
                                                $title = 'Custom Size';
                                                $size = get_field('booth_size',$postIdSession);
                                                if($title == $size){
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            }else {
                                                if($count == 0){
                                                    $active = 'active';
                                                } else {
                                                    $active = '';
                                                }
                                            }?>
                                             <div class="col-xs-6 col-sm-4 boothsingle">
                                            <div class="botsec-sngl <?php echo $active;?>" data-price="Submit custom request to receive quote">
                                                <p class="csstt">Custom Size</p>
                                            	<img src="<?php echo get_template_directory_uri();?>/images/custom.jpg" alt="custom option">
                                            	<i class="fa fa-check" aria-hidden="true"></i>
                                        	</div>
                                        </div>
                                </div>
                                <div class="sel-fields row">
                                    <div class="col-sm-6 martp">
                                        <input type="text" class="form-control wizwidth booth-with-field" placeholder="Enter Booth Width" value="<?php echo $width;?>">
                                    </div>
                                    <div class="col-sm-6 martp">
                                        <input type="text" class="form-control wizheight booth-height-field" placeholder="Enter Booth Length" value="<?php echo $height;?>">
                                    </div>
                                </div>
                                <div class="tab-btn clearfix">
                                    <button href="#" class="btn btn-green next call-to-save first-call-booth solid-green getoncontact">Continue Customizing Your Booth</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-5">
                            <div class="sel-main-img">
                                <h4>Your Booth</h4>
                                <img src="<?php echo get_template_directory_uri();?>/images/booth-big-img.png" class="img-responsive" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="wizard-2">
                    <div class="select-application row">
                        <div class="col-sm-7">
                            <div class="appli-lft-data">
                            <div class="slec-nxt tab-btn clearfix">
                               
                                    <a href="#" class="btn btn-green next app-next call-to-save solid-green">Add Optional Features</a>
                                </div>
                                <h2>Select Your Booth Application</h2>
                                <div class="select-opt list-term app-select">
                                    <div class="labls clearfix">
                                        <?php
                                            $args = array(
                                                'post_type' => 'products',
                                                'posts_per_page' =>-1,
                                                'order' => 'ASC'
                                            ); 
                                            $products_query = new WP_Query( $args );
                                            while ( $products_query->have_posts() ) {
                                            $products_query->the_post();
                                            $id = get_the_ID();
                                            if(!empty($postIdSession)){
                                            	$title = get_the_title($id);
                                            	$titletoo = get_field('application',$postIdSession);
                                            	if($title == $titletoo){
                                            		$selected = 'checked="checked"';
                                            	} else {
                                            		$selected = '';
                                            	}
                                            }?>
                                        <label class="check-label clearfix">
                                            <input class ="check-app-value" type="radio" name="apliction-check" <?php echo $selected;?> value="<?php the_title();?>">
                                            <span></span>
                                            <p><?php the_title();?></p>
                                        </label>
                                        <?php  /* Restore original Post Data */
                                             wp_reset_postdata();
                                             } ?>
                                             <label class="check-label clearfix">
                                            <input class ="check-app-value" type="radio" name="apliction-check" <?php echo $selected;?> value="Other">
                                            <span></span>
                                            <p>Other</p>
                                        </label>
                                        <a target="_blank" href="<?php echo get_home_url();?>/prefab-booths/" class="btn expl-epl">Explore Applications</a>
                                    </div>
                                </div>
                                <div class="slec-nxt tab-btn clearfix">
                                    <a href="#" class="btn btn-green next app-next call-to-save solid-green getoncontact">Add Optional Features</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="app-rit-data both-histry">
                                <div class="both-record">
                                    <h2>Your Booth</h2>
                                    <h3>You Have Selected</h3>
                                    <p class="clearfix">Application: <span class="aplic-txt"></span></p>
                                    <p class="clearfix">Size: <span class="size-txt"></span></p>
                                </div>
                                <div class="both-record-totl">
                                    <p>Estimated Total <span>$<?php echo $boothPrice;?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div role="tabpanel" class="tab-pane" id="wizard-4">
                    <div class="select-application select-features row">
                        <div class="col-sm-7">
                            <div class="appli-lft-data">
                                <div class="slec-nxt tab-btn clearfix">
                                    <!-- <a href="#" class="btn btn-green skip">Skip</a> -->
                                    <a href="#" class="btn btn-green next feature-next call-to-save flastnext solid-green">Choose Booth Color</a>
                                </div>
                                <h2>Select Optional Add-on Features for Your Booth</h2>
                                <div class="select-opt list-term">
                                    <div class="labls clearfix dynamic-features">
                                       <?php
                                            $args = array(
                                                'post_type' => 'features',
                                                'posts_per_page' =>-1,
                                                'order' => 'ASC'
                                            ); 
                                            $products_query = new WP_Query( $args );
                                            if(!empty($postIdSession)){
                                                $allSavedFeatures = get_field('features',$postIdSession);
                                                $allSavedFeaturesArray = explode(',', $allSavedFeatures);
                                            }
                                            while ( $products_query->have_posts() ) {
                                            $products_query->the_post();
                                            $id = get_the_ID();
                                            $title = get_the_title($id);
                                            if(!empty($postIdSession)){
                                                if(in_array($title, $allSavedFeaturesArray)){
                                                    $selected = 'checked="checked"';
                                                }else {
                                                    $selected = '';
                                                }
                                            }?>
                                        <label class="check-label clearfix">
                                            <input type="checkbox" class ="check-feature-value" <?php echo $selected;?> name="featue-check" value="<?php echo $title;?>">
                                            <span></span>
                                            <p><?php echo $title;?></p>
                                            <div class="feature-Price"></div>
                                        </label>
                                        <?php  /* Restore original Post Data */
                                             wp_reset_postdata();
                                             } ?>
                                        <a target="_blank" href="<?php echo get_home_url();?>/booth-features/" class="btn expl-epl">Explore Features</a>
                                    </div>
                                </div>
                                <div class="slec-nxt tab-btn clearfix">
                                    <!-- <a href="#" class="btn btn-green skip">Skip</a> -->
                                    <a href="#" class="btn btn-green next feature-next call-to-save flastnext solid-green getoncontact">Choose Booth Color</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="app-rit-data both-histry">
                                <div class="both-record">
                                    <h2>Your Booth</h2>
                                    <h3>You Have Selected</h3>
                                    <p class="clearfix">Application: <span class="aplic-txt"></span></p>
                                    <p class="clearfix">Size: <span class="size-txt"></span></p>
                                    <p class="clearfix">Features:<span class="feture-txt"></span></p>
                                </div>
                                <div class="both-record-totl">
                                    <p>Estimated Total <span>$<?php echo $boothPrice;?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="wizard-3">
                    <div class="select-application row">
                        <div class="col-sm-7">
                            <div class="appli-lft-data">
                                <div class="tab-btn tab-rit-btn clearfix">
                                    <!-- <a href="#" class="btn btn-green skip">Skip</a> -->
                                    <a href="#" class="btn btn-green next call-to-save solid-green">Get Instant Online Quote</a>
                                </div>
                                <h2>Select Color</h2>
                                <div class="gb-color-picker">
                                    <div data-input-trigger>
                                        <label class="fs-field-label fs-anim-upper" data-info="We'll make sure to use it all over"></label>
                                        <select class="cs-select cs-skin-boxes fs-anim-lower">
                                            <option value="" disabled selected>Pick a color</option>
                                            <option value="#362a50" data-class="color-d-space" <?php if($boothColor == 'Deep Space'){echo 'selected="selected"';}?>>Deep Space</option>
                                            <option value="#595b8e" data-class="color-g-flip" <?php if($boothColor == 'Gloss Flip Psychedelic'){echo 'selected="selected"';}?>>Gloss Flip Psychedelic</option>
                                            <option value="#874a2b" data-class="color-stain-flip" <?php if($boothColor == 'Satin Flip Volcanic Flare'){echo 'selected="selected"';}?>>Satin Flip Volcanic Flare</option>
                                            <option value="#3e5678" data-class="color-stain-frost" <?php if($boothColor == 'Satin Flip Glacial Frost'){echo 'selected="selected"';}?>>Satin Flip Glacial Frost</option>
                                            <option value="#0d5b5f" data-class="color-stain-shimmer" <?php if($boothColor == 'Satin Flip Caribbean Shimmer'){echo 'selected="selected"';}?>>Satin Flip Caribbean Shimmer</option>
                                            <option value="#213783" data-class="color-e-wave" <?php if($boothColor == 'Gloss Flip Electric Wave'){echo 'selected="selected"';}?>>Gloss Flip Electric Wave</option>
                                            <option value="#96191d" data-class="color-588c75" <?php if($boothColor == 'Smoldering Red'){echo 'selected="selected"';}?>>Smoldering Red</option>
                                            <option value="#690a12" data-class="color-b0c47f" <?php if($boothColor == 'Vampire Red'){echo 'selected="selected"';}?>>Vampire Red</option>
                                            <option value="#d55e30" data-class="color-f3e395" <?php if($boothColor == 'Canyon Copper'){echo 'selected="selected"';}?>>Canyon Copper</option>
                                            <option value="#c79933" data-class="color-f3ae73" <?php if($boothColor == 'Bitter Yellow'){echo 'selected="selected"';}?>>Bitter Yellow</option>
                                            <option value="#489c45" data-class="color-da645a" <?php if($boothColor == 'Apple Green'){echo 'selected="selected"';}?>>Apple Green</option>
                                            <option value="#007c41" data-class="color-79a38f" <?php if($boothColor == 'Sheer Luck Green'){echo 'selected="selected"';}?>>Sheer Luck Green</option>
                                            <option value="#0082a1" data-class="color-c1d099" <?php if($boothColor == 'Ocean Shimmer'){echo 'selected="selected"';}?>>Ocean Shimmer</option>
                                            <option value="#006fa9" data-class="color-f5eaaa" <?php if($boothColor == 'Perfect Blue'){echo 'selected="selected"';}?>>Perfect Blue</option>
                                            <option value="#241f61" data-class="color-f5be8f" <?php if($boothColor == 'Mystique Blue'){echo 'selected="selected"';}?>>Mystique Blue</option>
                                            <option value="#fafafa" data-class="color-e1837b" <?php if($boothColor == 'White'){echo 'selected="selected"';}?>>White</option>
                                            <option value="#e5e9e8" data-class="color-9bbaab" <?php if($boothColor == 'Frozen Vanilla'){echo 'selected="selected"';}?>>Frozen Vanilla</option>
                                            <option value="#f0ebd7" data-class="color-d1dcb2" <?php if($boothColor == 'Perl White'){echo 'selected="selected"';}?>>Perl White</option>
                                            <option value="#cac6c4" data-class="color-f9eec0" <?php if($boothColor == 'White Aluminum'){echo 'selected="selected"';}?>>White Aluminum</option>
                                            <option value="#768184" data-class="color-f7cda9" <?php if($boothColor == 'Battleship Gray'){echo 'selected="selected"';}?>>Battleship Gray</option>
                                            <option value="#383639" data-class="color-e8a19b" <?php if($boothColor == 'Dark Gray'){echo 'selected="selected"';}?>>Dark Gray</option>
                                            <option value="#313944" data-class="color-bdd1c8" <?php if($boothColor == 'Thundercloud'){echo 'selected="selected"';}?>>Thundercloud</option>
                                            <option value="#231f1b" data-class="color-e1e7cd" <?php if($boothColor == 'Gold Dust Black'){echo 'selected="selected"';}?>>Gold Dust Black</option>
                                            <option value="#181415" data-class="color-faf4d4" <?php if($boothColor == 'Black'){echo 'selected="selected"';}?>>Black</option>
                                            <option value="#976e56" data-class="color-fbdfc9" <?php if($boothColor == 'Caramel Luster'){echo 'selected="selected"';}?>>Caramel Luster</option>
                                            <option value="#ffffff" data-class="color-f1c1bd" <?php if($boothColor == 'Matte White'){echo 'selected="selected"';}?>>Matte White</option>
                                            <option value="#f171a5" data-class="color-g-pink" <?php if($boothColor == 'Pink'){echo 'selected="selected"';}?>>Pink</option>
                                            <option value="#402767" data-class="color-g-royal-blue" <?php if($boothColor == 'Royal Blue'){echo 'selected="selected"';}?>>Royal Blue</option>
                                            <option value="#8c2226" data-class="color-g-m-red" <?php if($boothColor == 'Metalic Red'){echo 'selected="selected"';}?>>Metalic Red</option>
                                            <option value="#ef3e36" data-class="color-g-red" <?php if($boothColor == 'Red'){echo 'selected="selected"';}?>>Red</option>
                                            <option value="#f68720" data-class="color-g-orange" <?php if($boothColor == 'Orange'){echo 'selected="selected"';}?>>Orange</option>
                                            <option value="#ffc115" data-class="color-g-yellow" <?php if($boothColor == 'Yellow'){echo 'selected="selected"';}?>>Yellow</option>
                                            <option value="#294b34" data-class="color-g-p-metalic" <?php if($boothColor == 'Pine Green Metalic'){echo 'selected="selected"';}?>>Pine Green Metalic</option>
                                            <option value="#3f441d" data-class="color-g-m-green" <?php if($boothColor == 'Military Green'){echo 'selected="selected"';}?>>Military Green</option>
                                            <option value="#1681c2" data-class="color-g-r-blue" <?php if($boothColor == 'Riviera Blue'){echo 'selected="selected"';}?>>Riviera Blue</option>
                                            <option value="#2d68b2" data-class="color-g-blue-m" <?php if($boothColor == 'Blue Metallic'){echo 'selected="selected"';}?>>Blue Metallic</option>
                                            <option value="#1e2935" data-class="color-g-indigo" <?php if($boothColor == 'Indigo'){echo 'selected="selected"';}?>>Indigo</option>
                                            <option value="#222222" data-class="color-g-d-black" <?php if($boothColor == 'Deep Black'){echo 'selected="selected"';}?>>Deep Black</option>
                                            <option value="#000000" data-class="color-black" <?php if($boothColor == 'Black'){echo 'selected="selected"';}?>>Black</option>
                                            <option value="#454442" data-class="color-g-c-metalic" <?php if($boothColor == 'Charcoal Metallic'){echo 'selected="selected"';}?>>Charcoal Metallic</option>
                                            <option value="#424343" data-class="color-g-d-grey" <?php if($boothColor == 'Dark Grey'){echo 'selected="selected"';}?>>Dark Grey</option>
                                            <option value="#939598" data-class="color-g-silver" <?php if($boothColor == 'Silver'){echo 'selected="selected"';}?>>Silver</option>
                                            <option value="#787877" data-class="color-g-aluminum" <?php if($boothColor == 'Grey Aluminum'){echo 'selected="selected"';}?>>Grey Aluminum</option>
                                            <option value="#665036" data-class="color-b-metalic" <?php if($boothColor == 'Brown Metallic'){echo 'selected="selected"';}?>>Brown Metallic</option>
                                            <option value="#925e31" data-class="color-co-metalic" <?php if($boothColor == 'Copper Metallic'){echo 'selected="selected"';}?>>Copper Metallic</option>
                                            <option value="#000000" data-class="color-cb-black" <?php if($boothColor == 'Carbon Fiber Black'){echo 'selected="selected"';}?>>Carbon Fiber Black</option>
                                            <option value="#777777" data-class="color-cb-ath" <?php if($boothColor == 'Carbon Fiber Anthracite'){echo 'selected="selected"';}?>>Carbon Fiber Anthracite</option>
                                            <option value="#ffffff" data-class="color-cb-white" <?php if($boothColor == 'Carbon Fiber White'){echo 'selected="selected"';}?>>Carbon Fiber White</option>
                                            <option value="#fffdf8" data-class="color-white-gold" <?php if($boothColor == 'White Gold Sparkle'){echo 'selected="selected"';}?>>White Gold Sparkle</option>
                                            <option value="#ffffff" data-class="color-white-gloss" <?php if($boothColor == 'Gloss White'){echo 'selected="selected"';}?>>Gloss White</option>
                                            <option value="#fbe4b0" data-class="color-white-light" <?php if($boothColor == 'Light Ivory'){echo 'selected="selected"';}?>>Light Ivory</option>
                                            <option value="#82662d" data-class="color-gold-metalic" <?php if($boothColor == 'Gold Metalic'){echo 'selected="selected"';}?>>Gold Metalic</option>
                                            <option value="#52c6ec" data-class="color-sky-blue" <?php if($boothColor == 'Sky Blue'){echo 'selected="selected"';}?>>Sky Blue</option>
                                            <option value="#03b2bd" data-class="color-a-blue" <?php if($boothColor == 'Atlantis Blue'){echo 'selected="selected"';}?>>Atlantis Blue</option>
                                            <option value="#089b93" data-class="color-a-teel" <?php if($boothColor == 'Atomic Teel'){echo 'selected="selected"';}?>>Atomic Teel</option>
                                            <option value="#109347" data-class="color-k-green" <?php if($boothColor == 'Kelly Green'){echo 'selected="selected"';}?>>Kelly Green</option>
                                            <option value="#046641" data-class="color-g-envy" <?php if($boothColor == 'Green Envy'){echo 'selected="selected"';}?>>Green Envy</option>
                                            <option value="#ebb638" data-class="color-l-sting" <?php if($boothColor == 'Lemon Sting'){echo 'selected="selected"';}?>>Lemon Sting</option>
                                            <option value="#eead1d" data-class="color-sunflower" <?php if($boothColor == 'Sunflower'){echo 'selected="selected"';}?>>Sunflower</option>
                                            <option value="#f28421" data-class="color-b-orange" <?php if($boothColor == 'Bright Orange'){echo 'selected="selected"';}?>>Bright Orange</option>
                                            <option value="#f47a20" data-class="color-bl-orange" <?php if($boothColor == 'Blunt Orange'){echo 'selected="selected"';}?>>Blunt Orange</option>
                                            <option value="#f15d2e" data-class="color-l-copper" <?php if($boothColor == 'Liquid Copper'){echo 'selected="selected"';}?>>liquid Copper</option>
                                            <option value="#d35031" data-class="color-f-orange" <?php if($boothColor == 'Fiery Orange'){echo 'selected="selected"';}?>>Fiery Orange</option>
                                            <option value="#da3426" data-class="color-hot-red" <?php if($boothColor == 'Hot Red Red'){echo 'selected="selected"';}?>>Hot Red Red</option>
                                            <option value="#cd2027" data-class="color-dark-red" <?php if($boothColor == 'Dark Red'){echo 'selected="selected"';}?>>Dark Red</option>
                                            <option value="#ca2629" data-class="color-d-red" <?php if($boothColor == 'Dragon Fire Red'){echo 'selected="selected"';}?>>Dragon Fire Red</option>
                                            <option value="#8d181b" data-class="color-lip-red" <?php if($boothColor == 'Lipstick Red'){echo 'selected="selected"';}?>>Lipstick Red</option>
                                            <option value="#932529" data-class="color-red-metal" <?php if($boothColor == 'Red Metallic'){echo 'selected="selected"';}?>>Red Metallic</option>
                                            <option value="#441f1f" data-class="color-b-cherry" <?php if($boothColor == 'Black Cherry'){echo 'selected="selected"';}?>>Black Cherry</option>
                                            <option value="#e3487e" data-class="color-hot-pink" <?php if($boothColor == 'Hot Pink'){echo 'selected="selected"';}?>>Hot Pink</option>
                                            <option value="#ef78ae" data-class="color-r-fizz" <?php if($boothColor == 'Raspberry Fizz'){echo 'selected="selected"';}?>>Raspberry Fizz</option>
                                            <option value="#b52368" data-class="color-f-f" <?php if($boothColor == 'Fierce Fuchsia'){echo 'selected="selected"';}?>>Fierce Fuchsia</option>
                                            <option value="#422772" data-class="color-plum-e" <?php if($boothColor == 'Plum Explosion'){echo 'selected="selected"';}?>>Plum Explosion</option>
                                            <option value="#0e1826" data-class="color-b-b" <?php if($boothColor == 'Boat Blue'){echo 'selected="selected"';}?>>Boat Blue</option>
                                            <option value="#212f63" data-class="color-db-m" <?php if($boothColor == 'Deep Blue Metallic'){echo 'selected="selected"';}?>>Deep Blue Metallic</option>
                                            <option value="#2a2c7a" data-class="color-b-berry" <?php if($boothColor == 'Blue Raspberry'){echo 'selected="selected"';}?>>Blue Raspberry</option>
                                            <option value="#19479e" data-class="color-cos-blue" <?php if($boothColor == 'Cosmic Blue'){echo 'selected="selected"';}?>>Cosmic Blue</option>
                                            <option value="#0954a0" data-class="color-int-blue" <?php if($boothColor == 'Intense Blue'){echo 'selected="selected"';}?>>Intense Blue</option>
                                            <option value="#23356d" data-class="color-b-metal" <?php if($boothColor == 'Blue Metallic'){echo 'selected="selected"';}?>>Blue Metallic</option>
                                            <option value="#475d77" data-class="color-ice-blue" <?php if($boothColor == 'Ice Blue'){echo 'selected="selected"';}?>>Ice Blue</option>
                                            <option value="#969393" data-class="color-white-al" <?php if($boothColor == 'White Aluminum'){echo 'selected="selected"';}?>>White Aluminum</option>
                                            <option value="#a5a2a1" data-class="color-s-grey" <?php if($boothColor == 'Storm Gray'){echo 'selected="selected"';}?>>Storm Gray</option>
                                            <option value="#979797" data-class="color-s-s" <?php if($boothColor == 'Sterling Silver'){echo 'selected="selected"';}?>>Sterling Silver</option>
                                            <option value="#3a3b3a" data-class="color-anth" <?php if($boothColor == 'Anthracite'){echo 'selected="selected"';}?>>Anthracite</option>
                                            <option value="#4d463a" data-class="color-char-m" <?php if($boothColor == 'Charcoal Metallic'){echo 'selected="selected"';}?>>Charcoal Metallic</option>
                                            <option value="#100d0f" data-class="color-mid-blue" <?php if($boothColor == 'Midnight Blue'){echo 'selected="selected"';}?>>Midnight Blue</option>
                                            <option value="#180034" data-class="color-wiked" <?php if($boothColor == 'Wicked'){echo 'selected="selected"';}?>>Wicked</option>
                                            <option value="#3d1f1f" data-class="color-black-rose" <?php if($boothColor == 'Black Rose'){echo 'selected="selected"';}?>>Black Rose</option>
                                            <option value="#210808" data-class="color-ember-b" <?php if($boothColor == 'Ember Black'){echo 'selected="selected"';}?>>Ember Black</option>
                                            <option value="#0f0c0b" data-class="color-b-metal" <?php if($boothColor == 'Black Metallic'){echo 'selected="selected"';}?>>Black Metallic</option>
                                            <option value="#000000" data-class="color-gloss-black" <?php if($boothColor == 'Gloss Black'){echo 'selected="selected"';}?>>Black Metallic</option>

                                        </select>
                                    </div>
                                </div>
                              <!--   <div class="tab-btn tab-rit-btn clearfix">
                                    <a href="#" class="btn btn-green skip">Skip</a>
                                    <a href="#" class="btn btn-green next call-to-save solid-green">Get Instant Online Quote</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="app-rit-data both-histry">
                                <div class="both-record">
                                    <h2>Your Booth</h2>
                                    <h3>You Have Selected</h3>
                                    <p class="clearfix">Application: <span class="aplic-txt"></span></p>
                                    <p class="clearfix">Size: <span class="size-txt"></span></p>
                                    <p class="clearfix">Features:<span class="feture-txt"></span></p>
                                    <p class="clearfix">Color: <span class="color-val color-section"></span></p>
                                </div>
                                <div class="both-record-totl">
                                    <p>Estimated Total <span>$<?php echo $boothPrice;?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="wizard-5">
                    <div class="select-application row">
                        <div class="col-sm-7">
                            <div class="appli-lft-data finish-tab">
                                <h2>Please Enter Your Information. You Will Get  Instant Estimated Pricing Now Online</h2>
                                <p>Feel free to write to us about any customization or feature you want in your booth. If you can think about it, we can do it. </p>
                                <div class="tab-form">
                                    <form class="form-horizontal">
                                        <!-- Text input-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md wzname" value="<?php echo $name;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md wzemail" value="<?php echo $email;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input id="phone" name="phone" type="text" placeholder="Enter Your Phone Number" class="form-control input-md wzphone" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input id="address" name="address" type="text" placeholder="Delivery Address" class="form-control input-md wzaddress">

                                            </div>
                                        </div>

                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea class="form-control wzmessage" id="textarea" name="textarea" placeholder="Message"></textarea>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-btn tab-rit-btn clearfix">
                                    <a href="#" class="btn btn-green wzquote-call solid-green" >Show Me the Price</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="app-rit-data both-histry">
                                <div class="both-record">
                                    <h2>Your Booth</h2>
                                    <h3>You Have Selected</h3>
                                    <p class="clearfix">Application: <span class="aplic-txt final-app-text"></span></p>
                                    <p class="clearfix">Size: <span class="size-txt final-size-text"></span></p>
                                    <p class="clearfix">Color: <span class="color-val final-color-text"></span></p>
                                    <p class="clearfix">Features: <span class="feture-txt final-feature-text"></span></p>
                                </div>
                                <div class="both-record-totl">
                                    <p>Estimated Total <span class="totalest">$<?php echo $boothPrice;?></span></p>
                                    <input type="hidden" name="totalval" class="finaldata" value="<?php echo $boothPrice;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer();?>