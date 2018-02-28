<?php /* Template Name: Faq Page */
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
		$terms = get_terms( array(
    		'taxonomy' => 'faq_categories',
    		'hide_empty' => false,
			) );
		?>
		<div class="contact-main">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h4>Categories</h4>
						<ul class="sidebar-menu">
							<li><a href="#" class="single-faq-category active" data-id="all-cat">All FAQS</a></li>
							<?php foreach($terms as $term){
									echo '<li><a href="#" class="single-faq-category" data-id="'.$term->term_id.'">'.$term->name.'</a></li>';
								}?>
						</ul>
					</div>
				</div>
				<div class="faq-section col-sm-9">
					  <div class="faq-content">
					  	  <div class="faq-loader"></div>
				          <div class="faq-collap">
				          <?php
                          $args = array(
                                'post_type' => 'faq',
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
                        	?>
				          </div>
      				</div>
				</div>
			</div>
		</div>
	</div>
</section>	
<section class="get-quote">
    <h6>Guardian Booth</h6>
    <h2><?php the_field('call_to_action_title',503);?></h2>
    <a href="<?php the_field('call_to_action_button_link',503);?>" class="btn btn-white get-quote-btn"><?php the_field('call_to_action_button_text',503);?></a>
</section>	            
<?php get_footer();?>