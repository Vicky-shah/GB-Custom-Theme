<?php /* Template Name: Testimonials Page */
get_header(); ?>
<section class="contact-us">
	<div class="container">
		<?php if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();  ?>
        		<div class="cotact-title">
            		<h2><?php the_field('sub_heading',get_the_ID());?></h2>
            		<?php the_content();?>
        		</div>
        	<?php } // end while
		} // end if
		?>
		<div class="contact-main">
			<div class="row">
			<?php
                          $args = array(
                                'post_type' => 'testimonials',
                                'posts_per_page' => -1,
                                'order' => 'DESC'
                             );
                        	$faq_query = new WP_Query( $args );
                        	$count= 0;
                                while ( $faq_query->have_posts() ) {
                                $faq_query->the_post();
                                $title = get_the_title();
                                $id = get_the_ID();
                                $content = get_the_content();
                                $path = get_template_directory_uri();
                                $designation = get_field('designation',$id);
                                echo '<div class="col-sm-6 margin-bottom">
										<div class="single-testimonial">
											<img src="'.$path.'/images/qoute-cc.png">
											<p>'.$content.'</p>
											<div class="autor-info">
												<h4>'.$title.'</h4>
												<span>'.$designation.'</span>
											</div>
										</div>
									</div>';
								}
                        	?>
				</div>
			</div>
		</div>
	</div>
</section>	
<section class="get-quote">
    <h6>Guardian Booth</h6>
    <h2><?php the_field('call_to_action_title',523);?></h2>
    <a href="<?php the_field('call_to_action_button_link',523);?>" class="btn btn-white get-quote-btn"><?php the_field('call_to_action_button_text',523);?></a>
</section>	            
<?php get_footer();?>