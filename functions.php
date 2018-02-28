<?php
function guardian_load_scripts() {
    // styles
    // wp_enqueue_style('googlefonts', '//fonts.googleapis.com/css?family=Raleway:300,400,500,700,800,900|Roboto:300,400,500,700,900|Poppins:300,400,500,600,700', false, NULL, 'all');
    wp_enqueue_style('bootstrap', 'https://d1zywcw37aesmt.cloudfront.net/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', 'https://d1zywcw37aesmt.cloudfront.net/css/font-awesome.min.css');
    wp_enqueue_style('owlcarousel', 'https://d1zywcw37aesmt.cloudfront.net/css/owl.carousel.min.css');
    wp_enqueue_style('owlcarouseltheme', 'https://d1zywcw37aesmt.cloudfront.net/css/owl.theme.default.min.css');
    if(is_page_template( 'wizard.php' )){
//        wp_enqueue_style('colorpickerselector', get_template_directory_uri() . '/gb-color-picker/css/cs-select.css');
        wp_enqueue_style('colorpickerselector', get_template_directory_uri() . '/gb-color-picker/css/cs-select.min.css');
//        wp_enqueue_style('colorpicker', get_template_directory_uri() . '/gb-color-picker/css/cs-skin-boxes.css');
        wp_enqueue_style('colorpicker', get_template_directory_uri() . '/gb-color-picker/css/cs-skin-boxes.min.css');
    }
//    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_style('custom', 'https://d1zywcw37aesmt.cloudfront.net/css/custom.min.css');
    wp_enqueue_style('selectto', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css');

//    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('responsive', 'https://d1zywcw37aesmt.cloudfront.net/css/responsive.min.css');

    // scripts
    wp_deregister_script( 'jquery' );
    wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, NULL, true);
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', false, NULL, true);
    wp_enqueue_script('owlcarousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', false, NULL, true);
    if(is_page_template( 'wizard.php' )){
//        wp_enqueue_script('classie', get_template_directory_uri() . '/gb-color-picker/js/classie.js', false, NULL, true);
        wp_enqueue_script('classie', get_template_directory_uri() . '/gb-color-picker/js/classie.min.js', false, NULL, true);
//        wp_enqueue_script('selectfx', get_template_directory_uri() . '/gb-color-picker/js/selectFx.js', false, NULL, true);
        wp_enqueue_script('selectfx', get_template_directory_uri() . '/gb-color-picker/js/selectFx.min.js', false, NULL, true);
//        wp_enqueue_script('snipet', get_template_directory_uri() . '/js/helpers.js', false, NULL, true);
        wp_enqueue_script('snipet', get_template_directory_uri() . '/js/helpers.min.js', false, NULL, true);
    }
//    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', false, NULL, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.min.js', false, NULL, true);
    wp_enqueue_script('selecttoo', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', false, NULL, true);
    if(is_front_page() || is_page_template('contact.php')){
        //wp_enqueue_script('map', '//maps.googleapis.com/maps/api/js?key=AIzaSyB3x0q6xclQgvkEZk9xMCI9RxYYWSMWQAg&callback=initMap',false, NULL,'all');
    }
//    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', false, NULL, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.min.js', false, NULL, true);

    //IE10 viewport hack for Surface/desktop Windows 8 bug
//    wp_enqueue_script('viewport-bug-js', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', false, NULL, true);
}
add_action('wp_enqueue_scripts', 'guardian_load_scripts');

//-- Add feature image to posts --//
add_theme_support( 'post-thumbnails' );

//-- remove admin bar from frontend --//
show_admin_bar( false );

//-- Register theme menus --//
function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );
// Add 'btn main-btn' class to top menu anchor
add_filter( 'nav_menu_link_attributes', 'My_Theme_nav_menu_link_atts', 10, 4 );
function My_Theme_nav_menu_link_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'top-menu' ) {
        // add the desired attributes:
        $atts['class'] = 'btn main-btn';
    }
    return $atts;
}
// get image url and caption/alt
function get_post_image_url_alt($post_id) {
    $image = [];
    $image_url = wp_get_attachment_image_src(get_post_thumbnail_id( $post_id ), 'full');
//    $image_caption = get_the_post_thumbnail_caption($post_id);
    $alt_text = get_post_meta(get_post_thumbnail_id( $post_id ), '_wp_attachment_image_alt', true);
    array_push($image, $image_url[0], $alt_text);
    return $image;
}
// limit characters in string
function limit_characters($string, $length) {
    if(strlen($string)<=$length) {
        return $string;
    } else {
        $y=substr($string,0,$length) . '...';
        return $y;
    }
}
// sidebars
register_sidebars(8, array('before_title'=>'<h4>','after_title'=>'</h4>', 'before_widget'=>'<div>', 'after_widget'=>'</div>'));
add_action( 'widgets_init', 'guardianBooth_widgets_init' );
function guardianBooth_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Top Sidebar', 'guardian_booth' ),
        'id' => 'top-bar',
        'description' => __( 'Widgets in this area will be shown on top bar.', 'guardian_booth' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
// Adding ItemProp To Menu
// function ItemsProp( $atts, $item, $args ) {
//     // check if the item is in the primary menu
//     if( $args->theme_location == 'main-menu' ) {
//         // add the desired attributes:
//         $atts['itemprop'] = 'url';
//     }
//     return $atts;
// }
// add_filter( 'nav_menu_link_attributes', 'ItemsProp', 10, 4 );

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Excerpt
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function remove_script_version( $src ){
//    $parts = '';
//    if( strpos( $src, '?ver' ) ) {
//        $parts = explode( '?ver', $src );
//    }
//    if( strpos( $src, '.JPG?' ) ) {
//        $parts = explode( '?', $src );
//    }
//    if( strpos( $src, '?v=' ) ) {
//        $parts = explode( '?v=', $src );
//    }
    $parts = explode( '?ver', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', 'remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'remove_script_version', 15, 1 );
// REMOVE EMOJI ICONS
//remove_action('wp_head', 'print_emoji_detection_script', 7);
//remove_action('wp_print_styles', 'print_emoji_styles');
/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
// Remove WP embed script
function speed_stop_loading_wp_embed() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'speed_stop_loading_wp_embed');
// Remove comment-reply.min.js from footer
function comments_clean_header_hook(){
    wp_deregister_script( 'comment-reply' );
}
add_action('init','comments_clean_header_hook');

// Quote Email

function guardingQuoteEmail(){
    if(isset($_REQUEST['email'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $size = $_REQUEST['size'];
        if($size == 'custom-size') {
            $cs_w = $_REQUEST['cs_w'];
            $cs_h = $_REQUEST['cs_h'];
            $custom_size = 'Width : '.$cs_w.' Height: '.$cs_h.' <br>';
        } else {
            $custom_size = '';
        }
        $address = $_REQUEST['address'];
        $zip = $_REQUEST['zip'];
        $product = $_REQUEST['product'];
        $features = $_REQUEST['features'];
        $message = $_REQUEST['message'];
        if(!empty($features)){
            $allFeatures = implode(",", $features);
        } else {
            $allFeatures ='';
        }
        $to = array('sales@guardianbooth.com','joseph@rankfriendly.com');
        $subject = 'Guardian Booth Quote Request for ( '.$email.' )';
        $message = '
      Name : '.$name.' <br>
      Email : '.$email.' <br>
      Phone : '.$phone.' <br>
      Address : '.$address.','.$zip.' <br>
      Size : '.$size.' <br>
      '.$custom_size.'
      Product : '.$product.' <br>
      Features : '.$allFeatures.' <br>
      Message : '.$message.' <br>
      ';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $message, $headers );
    }
    wp_die();
}
add_action( 'wp_ajax_guardingQuoteEmail', 'guardingQuoteEmail' );
add_action( 'wp_ajax_nopriv_guardingQuoteEmail', 'guardingQuoteEmail' );

// Contact Email

function guardingContactEmail(){
    if(isset($_REQUEST['email'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $userMessage = $_REQUEST['message'];


        $to = array('info@guardianbooth.com','joseph@rankfriendly.com');
        $subject = $subject;
        $message = '
      Name : '.$name.' <br>
      Email : '.$email.' <br>
      Message : '.$userMessage.' <br>
      ';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $message, $headers );
    }
    wp_die();
}
add_action( 'wp_ajax_guardingContactEmail', 'guardingContactEmail' );
add_action( 'wp_ajax_nopriv_guardingContactEmail', 'guardingContactEmail' );

// Get FAQs

function getThisCategory(){
    if(isset($_REQUEST['catid'])){
        $cataId = $_REQUEST['catid'];
        if($cataId == 'all-cat'){
            echo '<div class="faq-collap">';
            $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );
            $faq_query = new WP_Query( $args );
            $count= 0;
            while ( $faq_query->have_posts() ) {
                $faq_query->the_post();
                $title = get_the_title();
                $id = get_the_ID();
                $content = get_the_content();
                if($count == 0){
                    $active = 'active';
                } else {
                    $active = '';
                }
                echo '<div class="faq-sngl">
                              <div class="collap-data '.$active.'">
                                  <h4>'.$title.'<span><i class="fa fa-angle-down" aria-hidden="true"></i></span></h4>
                                <p>'.$content.'</p>
                              </div>
                          </div>';
                $count++;}

            echo '</div>';

        } else {
            echo '<div class="faq-collap">';
            $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'faq_categories',
                        'field'    => 'term_id',
                        'terms'    => $cataId,
                    ),
                ),
            );
            $faq_query = new WP_Query( $args );
            $count= 0;
            while ( $faq_query->have_posts() ) {
                $faq_query->the_post();
                $title = get_the_title();
                $id = get_the_ID();
                $content = get_the_content();
                if($count == 0){
                    $active = 'active';
                } else {
                    $active = '';
                }
                echo '<div class="faq-sngl">
                              <div class="collap-data active">
                                  <h4>'.$title.'<span><i class="fa fa-angle-down" aria-hidden="true"></i></span></h4>
                                <p>'.$content.'</p>
                              </div>
                          </div>';
                $count++;}

            echo '</div>';
        }
    }
    wp_die();
}
add_action( 'wp_ajax_getThisCategory', 'getThisCategory' );
add_action( 'wp_ajax_nopriv_getThisCategory', 'getThisCategory' );

// Wizard Creation Functions

// Check Userid Exist
function checkUserIdExist($userid){
    $args = array(
        'post_type' => 'boothcustomization',
        'posts_per_page' => 1,
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key'     => 'session_id',
                'value'   => $userid,
                'compare' => 'IN',
            ),
        ),
    );
    $check_query = new WP_Query( $args );

    while ( $check_query->have_posts() ) {
        $check_query->the_post();
        $id = get_the_ID();
    }
    wp_reset_postdata();
    return $id;
}

function createBoothWizard(){
    if(isset($_REQUEST['userid'])){
        $userId = $_REQUEST['userid'];
        $email = $_REQUEST['email'];
        $name = $_REQUEST['name'];
        $boothSize = $_REQUEST['size'];
        $boothPrice = $_REQUEST['boothprice'];
        $application = $_REQUEST['application'];
        $featuresArray = $_REQUEST['features'];
        $features = implode(',', $featuresArray);
        $checkUser = checkUserIdExist($userId);
        $color = $_REQUEST['color'];
        $customSize = $_REQUEST['customsize'];
        if($customSize == 'true'){
            $width = $_REQUEST['width'];
            $height = $_REQUEST['height'];
        } else {
            $width = '';
            $height = '';
        }

        // single feature add
        if(isset($_REQUEST['single-feature'])){
            $allFeaturesArray = [];
            $singleFeature = $_REQUEST['single-feature'];
            if(!empty($singleFeature)){
                $allFeatures = get_field('features',$checkUser);
                if(!empty($allFeatures)){
                    array_push($allFeaturesArray, $allFeatures);
                    array_push($allFeaturesArray, $singleFeature);
                    $features = implode(',', $allFeaturesArray);
                    update_post_meta ($checkUser , 'features', $features);
                } else {
                    update_post_meta ($checkUser , 'features', $singleFeature);
                }
            }
        } else {
            update_post_meta ($checkUser , 'features', $features);
        }
        if(!empty($checkUser)){
            update_post_meta ($checkUser , 'session_id', $userId);
            update_post_meta ($checkUser , 'email_address', $email);
            update_post_meta ($checkUser , 'booth_size', $boothSize);
            update_post_meta ($checkUser , 'booth_price', $boothPrice);
            update_post_meta ($checkUser , 'application', $application);
            update_post_meta ($checkUser , 'booth_color', $color);
        } else {
            $postattr = array(
                'post_title' => $name,
                'post_status' => 'publish',
                'post_type' => 'boothcustomization',
            );
            $postID = wp_insert_post($postattr);
            if (!empty($postID)){
                update_post_meta ($postID , 'session_id', $userId);
                update_post_meta ($postID , 'email_address', $email);
                update_post_meta ($postID , 'booth_size', $boothSize);
                update_post_meta ($postID , 'booth_price', $boothPrice);
                update_post_meta ($postID , 'booth_width', $width);
                update_post_meta ($postID , 'booth_height', $height);
                update_post_meta ($postID , 'custom_size', $customSize);
                update_post_meta ($postID , 'quote_status', 'In Proccess');
            }
        }
    }
    die();
}
add_action( 'wp_ajax_createBoothWizard', 'createBoothWizard' );
add_action( 'wp_ajax_nopriv_createBoothWizard', 'createBoothWizard' );
//Wizard Quote
function wizardQuoteEmail(){
    if(isset($_REQUEST['email'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];
        $userMessage = $_REQUEST['message'];
        $application = $_REQUEST['application'];
        $boothSize = $_REQUEST['size'];
        $features = $_REQUEST['features'];
        $color = $_REQUEST['color'];
        $total = $_REQUEST['total'];
        $userID = $_REQUEST['userid'];
        $checkUser = checkUserIdExist($userID);
        $to = array('sales@guardianbooth.com','joseph@rankfriendly.com','usman.shakil721@gmail.com');
        $subject = 'Guardian Booth Customized Quote Request for ('.$email.')';
        $message = '
      <h3>Customer Information</h3>
      Name : '.$name.' <br>
      Email : '.$email.' <br>
      Phone : '.$phone.' <br>
      Address : '.$address.' <br>
      Message : '.$userMessage.' <br>
      <h3>Booth Information</h3>
      Application : '.$application.' <br>
      Booth Size : '.$boothSize.' <br>
      Booth Color : '.$color.' <br>
      Features Included : '.$features.' <br>
      Estimated Total : '.$total.' <br>
      <h4>Reference number for user : '.$userID.'</h4>
      ';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $message, $headers );
        update_post_meta ($checkUser , 'quote_status', 'Completed Email Sent');
    }
    wp_die();
}
add_action( 'wp_ajax_wizardQuoteEmail', 'wizardQuoteEmail' );
add_action( 'wp_ajax_nopriv_wizardQuoteEmail', 'wizardQuoteEmail' );

// Booth Name

function getBoothName(){
    if(isset($_REQUEST['boothtitle'])){
        $titleBooths = $_REQUEST['boothtitle'];
        $seccionID = $_REQUEST['secctionId'];
        $postIdSession = checkUserIdExist($seccionID);
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
            }
            echo '<label class="check-label clearfix">
                <input type="checkbox" class ="check-feature-value" '.$selected.' name="featue-check" value="'.$title.'">
                <span></span>
                <p>'.$title.'</p>';
            if( have_rows('booths_pricing') ):
                while( have_rows('booths_pricing') ): the_row();
                    $booth = get_sub_field('booth_type');
                    $priceTitle = get_the_title($booth);


                    if($titleBooths == $priceTitle){
                        $featurePrice = get_sub_field('feature_price');
                        $featureDetail = get_sub_field('feature_detail');
                        echo '<div class="feature-Price">
                <h5 data-value="'.$featurePrice.'">$'.$featurePrice.'</h5><h6>'.$featureDetail.'</h6>
                </div>';
                    }
                endwhile;
            endif;
            echo '</label>';

            /* Restore original Post Data */
            wp_reset_postdata();
        }
    }
    die();
}
add_action( 'wp_ajax_getBoothName', 'getBoothName' );
add_action( 'wp_ajax_nopriv_getBoothName', 'getBoothName' );
// sitemap generator
add_action( "save_post", "gb_create_sitemap" );
function gb_create_sitemap() {
    $postsForSitemap = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'modified',
        'post_type'   => array( 'post', 'page', 'products' ),
        'order'       => 'DESC'
    ) );
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= "\n" . '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach( $postsForSitemap as $post ) {
        if($post->post_name != 'privacy-policy') {
            setup_postdata( $post );
            $postdate = explode( " ", $post->post_modified );
            $sitemap .= "\t" . '<url>' . "\n" .
                "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
                "\n\t\t" . '<lastmod>' . $postdate[0] . '</lastmod>' .
                "\n\t\t" . '<changefreq>monthly</changefreq>' .
                "\n\t" . '</url>' . "\n";
        }
    }
    $sitemap .= '</urlset>';
    $fp = fopen( ABSPATH . "sitemap.xml", 'w' );
    fwrite( $fp, $sitemap );
    fclose( $fp );
}
// remove canonical tag
//if( function_exists( 'rel_canonical' ) )
//{
//    remove_action( 'wp_head', 'rel_canonical' );
//}
//function remove_canonical_meta_tag() {
//    if(is_front_page() || is_home()) {
//        return false;
//    } else {
//        global $wp_the_query;
//        if ( !$id = $wp_the_query->get_queried_object_id() )
//            return;
//
//        $link = get_permalink( $id );
//        echo "<link rel='canonical' href='$link' />\n";
//    }
//}
//add_action('wp_head', 'remove_canonical_meta_tag');

// remove next/prev shortlinks
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10,0);
// generate random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}