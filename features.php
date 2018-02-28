<?php /* Template Name: All Features */
get_header(); ?>
<section class="feature-main">
    <div class="container">
        <div class="features-data">
            <?php get_template_part('includes/loop','features'); ?>
            <div class="buttons-feature-page">
                <a class="btn btn-green read-more-btn add-feature" href="<?php echo get_home_url();?>/quote/">Get a quote</a>
                <a class="btn btn-green read-more-btn add-feature" href="<?php echo get_home_url();?>/booth-pricing/">Build And Price</a>
            </div>
        </div>
        <div class="feature-bullet-points clearfix">
            <p>List of additional add-on features we have previously done by request:</p>
            <div class="bullet-list appli-content customwidth">
                <?php the_content();?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
