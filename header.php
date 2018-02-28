<?php
// Start the session
$pageID = get_the_ID();
session_start();
$user_id = $_SESSION['user_id'];
if(empty($user_id) && !isset($user_id)) {
    //$quote_counter = get_field('visitor_id', 90 );
//    $quote_counter = $quote_counter + 1;
    $quote_counter = generateRandomString();
    // if (function_exists('w3tc_pgcache_flush_post')){
    //     w3tc_pgcache_flush_post(get_the_ID());
    // }
    update_post_meta( 90, 'visitor_id', $quote_counter );
    $user_id = 'user-'.$quote_counter;
    $_SESSION['user_id'] = $user_id;
}
$postIdSession = checkUserIdExist($user_id);
if(!empty($postIdSession)){
    $quoteStatus = get_field('quote_status',$postIdSession);
    if($quoteStatus == 'Completed Email Sent'){
        session_unset();
        session_destroy();
    }
}
// echo $user_id;
// echo $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <!-- default-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(is_page('privacy-policy')) { ?>
        <meta name="robots" content="noindex, nofollow">
    <?php } else { ?>
        <meta name="robots" content="index, follow">
    <?php } ?>
    <meta name="description" content="<?php the_field('meta_description',$pageID);?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php the_field('meta_title',$pageID);?>" />
    <meta property="og:site_name" content="Guardian Booth">
    <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:description" content="<?php the_field('meta_description',$pageID);?>">
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/logo.png" />
    <meta property="og:type" content="website">
    <meta name="author" content="">
    <meta name="msvalidate.01" content="A7963E09DE075C0751D85B1D0E782771" />
    <title><?php if ( is_singular() ) {
            the_field('meta_title', get_the_ID());
        } else {
            bloginfo('name');
            wp_title('|', true, '');
        } ?></title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script async="async" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script async="async" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <script async="async" type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var ajaxurlSec = '<?php echo get_template_directory_uri(); ?>/wizard.php';
    </script>
    <script async="async">
        window['_fs_debug'] = false;
        window['_fs_host'] = 'fullstory.com';
        window['_fs_org'] = '549FJ';
        window['_fs_namespace'] = 'FS';
        (function(m,n,e,t,l,o,g,y){
            if (e in m && m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].'); return;}
            g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
            o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
            y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
            g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};
            g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
            g.clearUserCookie=function(c,d,i){if(!c || document.cookie.match('fs_uid=[`;`]*`[`;`]*`[`;`]*`')){
                d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
                    ';path=/;expires='+new Date(0).toUTCString();i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}};
        })(window,document,window['_fs_namespace'],'script','user');
    </script>
    <script async="async">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-101498316-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- <script async="" defer="" src="//survey.g.doubleclick.net/async_survey?site=nwfkxvzdt5qyee67t7lvjv5lyy"></script> -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="top-bar">
    <?php if ( is_active_sidebar( 'top-bar' ) ) { dynamic_sidebar( 'top-bar' ); } ?>
</div>
<?php $imageOrVideo = get_field('select_video_or_image');
//echo get_the_ID();
if($imageOrVideo == 'image'){
    if ( is_front_page() || is_home() ) {
        $bgimage = get_field("background_image");
        $classSubPage = '';
    } else {
        $bgimage = get_field("background_image");
        $classSubPage = 'sub-pages';
    }
} else {
    $bgimage =get_template_directory_uri().'/images/sub-bg.jpg';
    if(is_single()){
        $classSubPage = 'sub-pages';
    } else {
        $classSubPage = '';
    }
    if(is_page_template('wizard.php') || is_page_template('features.php') || is_page_template('products.php') || is_page_template('contact.php') || is_page_template('pricing.php') || is_page_template('faq.php') || is_page_template('testimonials.php') || is_page_template('quote.php') || is_page_template('privacypolicy.php')){
        $classSubPage = 'sub-pages';
    }
}?>

<section class="booth-section <?php echo $classSubPage; ?>" style="background-image:url('<?php echo $bgimage; ?>')">
    <h3 class="hidden">image</h3>
    <?php
    if($imageOrVideo == 'video'){?>
        <div class="bg-vid">
            <video class="video" id="flixel-video" preload="" autoplay="" loop="" poster="" playsinline="">
                <source src="<?php the_field('background_video',get_the_ID());?>" type="video/mp4">
            </video>
        </div>
    <?php } ?>
    <nav class="navbar navbar-default gb-nav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="https://d1zywcw37aesmt.cloudfront.net/wp-content/uploads/2017/08/logo-1.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'items_wrap' => '%3$s',
                            'container' => '',
                            'menu_class' => ''
                        ) ); ?>
                    <!-- show-sidebar -->
                    <!-- <li><a href="<?php //echo get_home_url();?>/booth-pricing/" class="pad-t-7"><img src="<?php //echo get_template_directory_uri();?>/images/booth-icon.png" alt=""></a></li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?php if ( !is_front_page() ) {
        if(!is_singular( 'products' )){ ?>
            <div class="container">
                <h1 class="page-title"><?php if(get_field('page_heading', $pageID) != '') { the_field('page_heading', $pageID); } else { echo get_the_title($pageID); } ?></h1>
            </div>
        <?php }
        if(is_singular( 'products' )){?>
            <div class="container">
                <h1 class="page-title"><?php the_field('product_sub_heading',$pageID);?></h1>
            </div>

        <?php }
    }?>
    <?php if ( is_front_page() ) {?>
        <div class="home-banner">
            <div class="container text-center">
                <div class="booth-para">
                    <h1>Prefab Booths of the Highest Quality Customized to Meet Your Needs </h1>
                    <a class="btn btn-green btn-block" href="<?php echo site_url(); ?>/booth-pricing/">Design and Price Your Booth in Minutes</a>
                </div>
                <?php /* ?>
        <form action="<?php echo get_home_url();?>/quote" method="post">
            <div class="booth-para"><p>I need a booth for a</p>
                <div class="dropdown gb-multi-select green-select">

                    <select class ="pro-list products-list" name="product_list">
                        <?php
                          $args = array(
                                'post_type' => 'products',
                                'posts_per_page' => -1,
                                'order' => 'DESC'
                             );
                        $products_query = new WP_Query( $args );
                                echo '<option value="select">Please Select</option>';
                                while ( $products_query->have_posts() ) {
                                $products_query->the_post();
                                $title = get_the_title();
                                $id = 'product-'.get_the_ID();

                                    echo '<option value="'.$id.'">'.$title.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <p class="preiod">.</p>
                <br>
                <p>Tell me more about</p>
                <div class="dropdown gb-multi-select green-select">
                 <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">
                        <span class="selected-val">Please Select</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
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

                                    echo '<li class="checkbox">
                            <label>
                                <input class="features-list" type="checkbox" name="fet[]" value="'.$id.'"> '.$title.'
                            </label>
                        </li>';
                            }
                        ?>
                    </ul>
                </div>
                <p class="preiod">.</p>
            </div>
            <input type="submit" class="btn btn-green btn-block" value="Submit">
            </form>
            <?php */ ?>
            </div>
        </div>
        <!--    <img class="booth-img" src="images/booth.png" alt="">-->
    <?php }?>
</section>