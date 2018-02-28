<?php /* Template Name: Pricing */
get_header(); ?>
<section class="pricing-main">
    <div class="container">
        <div class="pricing-content">
        <?php $post_id = get_the_ID();
			  $post_content = get_post($post_id);
			  $content = $post_content->post_content;?>
            <p class="text-center"><?php echo $content;?></p>
            <div class="pricing-cols row">
            <?php get_template_part('includes/loop','pricing');?>
            </div>
        </div>
    </div>
</section>
<section class="get-quote">
    <h6>Guardian Booth</h6>
    <h1>Let’s secure your premises</h1>
    <a href="#" class="btn btn-white get-quote-btn">Get Quote</a>
</section>
<?php get_footer();?>