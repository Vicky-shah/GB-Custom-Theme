<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="address-widget">
                    <?php if ( is_active_sidebar( 'sidebar-1' ) ) { dynamic_sidebar( 'sidebar-1' ); } ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="address-widget">
                    <?php if ( is_active_sidebar( 'sidebar-2' ) ) { dynamic_sidebar( 'sidebar-2' ); } ?>
                </div>
            </div>
            <div class="height-set"></div>
            <div class="col-sm-6 col-md-3">
                <div class="address-widget">
                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) { dynamic_sidebar( 'sidebar-3' ); } ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="address-widget">
                    <?php if ( is_active_sidebar( 'sidebar-4' ) ) { dynamic_sidebar( 'sidebar-4' ); } ?>
                </div>
            </div>
        </div>
        <hr class="gb-divider">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="gb-widget gb-widget-1">
                    <img class="footer-logo" src="https://d1zywcw37aesmt.cloudfront.net/wp-content/uploads/2017/08/logo-1.png" alt="logo">
                    <?php if ( is_active_sidebar( 'sidebar-5' ) ) { dynamic_sidebar( 'sidebar-5' ); } ?>
                </div>
            </div>
            <div class="col-xs-3 col-sm-6 col-md-3 text-center">
                <div class="gb-widget">
                    <?php if ( is_active_sidebar( 'sidebar-6' ) ) { dynamic_sidebar( 'sidebar-6' ); } ?>
                </div>
            </div>
             <div class="height-set2"></div>
            <div class="col-xs-4 col-sm-6 col-md-3 text-center">
                <div class="gb-widget">
                    <?php if ( is_active_sidebar( 'sidebar-7' ) ) { dynamic_sidebar( 'sidebar-7' ); } ?>
                </div>
            </div>
            <div class="col-xs-5 col-sm-6 col-md-3 text-center">
                <div class="gb-widget subscribe-bar">
                    <?php if ( is_active_sidebar( 'sidebar-8' ) ) { dynamic_sidebar( 'sidebar-8' ); } ?>
                </div>
            </div>
        </div>

        <div class="footer-bottom clearfix">
            <p>&copy; 2017 All Rights Reserved</p>
            <ul class="footer-nav pull-right">
                 <?php //wp_nav_menu(
                //     array(
                //         'theme_location' => 'footer-menu',
                //         'items_wrap' => '%3$s',
                //         'container' => '',
                //         'menu_class' => ''
                //     ) ); ?>
            </ul>
        </div>
    </div>
</footer>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body styled-m">
        <h4>Thank you for reaching out to us. We will get back to you soon.</h4>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="custModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">x</div>
      <div class="modal-body styled-m">
        <h4>Thank You for submitting your quote.We will contact you to finalize your options and send you your finalized quote.</h4>
      </div>
    </div>
  </div>
</div>
<!-- <div class="feature-sidebar"> -->
<?php
// $user_id = $_SESSION['user_id']; 
//  $postIdSession = checkUserIdExist($user_id);
//  if(!empty($postIdSession)){
//     $boothPrice = get_field('booth_price',$postIdSession);
//     $booth_size = get_field('booth_size',$postIdSession);
//     $booth_application = get_field('application',$postIdSession);
//     $booth_features = get_field('features',$postIdSession);
//     $booth_user_email = get_field('email_address',$postIdSession);
//     $booth_color = get_field('booth_color',$postIdSession);
//     $booth_user_name = get_the_title($postIdSession);
//  } else {

//     $boothPrice = '3495';
//     $booth_size = 'None';
//     $booth_application = 'None';
//     $booth_color = 'None';
//     $booth_features = 'None';
//  }
?>
<!--     <div class="feature-close">
        <i class="fa fa-times"></i>
    </div>
    <div class="sidebar-top-content">
        <h2>Your Booth</h2>
        <p>You Have Selected</p>
        <ul>
            <li class="sm-booth-app">Application: <span><?php echo $booth_application;?></span></li>
            <li class="sm-booth-size">Size: <span><?php echo $booth_size;?></span></li>
            <li class="sm-booth-size">Color: <span><?php echo $booth_color;?></span></li>
            <li class="sm-booth-feature">Features: <span><?php echo $booth_features;?></span></li>
            <input type="hidden" name="sm-booth-name" class="sm-booth-name" value="<?php echo  $booth_user_name;?>">
            <input type="hidden" name="sm-booth-email" class="sm-booth-email" value="<?php echo  $booth_user_email;?>">
        </ul>
        <div class="sidebar-btn">
            <a class="btn btn-green read-more-btn" href="<?php echo get_home_url();?>/wizard">Customize your booth</a>
        </div>
    </div>
    <div class="sidebar-total">
        <p>Starting Price <span>$<?php echo $boothPrice;?></span></p>
    </div>
    <div class="sidebar-quote">
        <a class="btn btn-green read-more-btn" href="<?php echo get_home_url();?>/quote">Get A Quote</a>
    </div>

</div> -->
<?php /*
if(is_front_page() || is_page_template('contact.php')){
  $icon = get_field('map_icon',get_the_ID());
$lat = get_field('map_latitude',get_the_ID());
$lng = get_field('map_longitude',get_the_ID());
 echo "<script>
      var map;
      function initMap() {
        var myLatLng = {lat: ".$lat.", lng: ".$lng."};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          scrollwheel: false,
          center: myLatLng,
          mapTypeId: 'roadmap'
        });
        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          icon: '".$icon."',
          title: 'Broadway'
        });
    }
  </script>";
}
  */ ?>
<?php wp_footer();?>
<!-- begin SnapEngage code -->
<script async="async" type="text/javascript">
  (function() {
    var se = document.createElement('script'); se.type = 'text/javascript'; se.async = true;
    se.src = '//storage.googleapis.com/code.snapengage.com/js/bb8f7490-c64a-434e-8d34-976ff2cb15a8.js';
    var done = false;
    se.onload = se.onreadystatechange = function() {
      if (!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete')) {
        done = true;
        /* Place your SnapEngage JS API code below */
        /* SnapEngage.allowChatSound(true); Example JS API: Enable sounds for Visitors. */
      }
    };
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(se, s);
  })();
</script>
</body>
</html>