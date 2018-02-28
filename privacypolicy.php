<?php /* Template Name: Privacy Page */
get_header(); ?>
<section class="contact-us">
	<div class="container">
		<?php if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();  ?>
        		<div class="cotact-title">
            		<h2><?php the_field('sub_heading',get_the_ID());?></h2>
            		
        		</div>
        	
		<div class="contact-main">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h4>Categories</h4>
						<ul class="sidebar-menu">
							<li><a href="#" class="single-page-category active">PRIVACY POLICY</a></li>
						</ul>
					</div>
				</div>
				<div class="faq-section col-sm-9">
						<div class="privacy-content">
						<?php the_content();?>
						</div>
				</div>
			</div>
		</div>
		<?php } // end while
		} // end if
		?>
	</div>
</section>	
<section class="get-quote">
    <h6>Guardian Booth</h6>
    <h1><?php the_field('call_to_action_title',503);?></h1>
    <a href="<?php the_field('call_to_action_button_link',503);?>" class="btn btn-white get-quote-btn"><?php the_field('call_to_action_button_text',503);?></a>
</section>	            
<?php get_footer();?>