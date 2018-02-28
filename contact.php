<?php /* Template Name: Contact */
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
                <div class="col-sm-6">
                    <div class="contact-form">
                        <form class="form-horizontal">
                            <h3>Send a Message</h3>
                            <!-- Text input-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="name" name="name" type="text" placeholder="Name"
                                                   class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="email-contact" name="email"  type="text" placeholder="Email"
                                                   class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message">Message </textarea>
                                    <div class="contact-icons">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <div class="contact-btn col-md-12">
                                    <a class="btn btn-green read-more-btn contact_us_button" href="#">Submit</a>
                                </div>
                                <div class="thankyou-message"><h4>Tanky you for reaching out to us. We will get back to you soon.</h4></div>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-md-offset-1">
                    <div class="contact-detail">
                        <ul>
                         <?php // check if the repeater field has rows of data
								if( have_rows('contact_details') ):
						// loop through the rows of data
				    			while ( have_rows('contact_details') ) : the_row();?>
                            <li>
                                <div class="detail-list">
                                    <span><img src="<?php the_sub_field('detail_icon',$id);?>" alt="icon"></span>
                                    <div class="detail-para">
                                        <h3><?php the_sub_field('detail_title',$id);?></h3>
                                        <?php the_sub_field('details_text',$id);?>
                                    </div>
                                </div>
                            </li>
                            <?php 
                            	endwhile;
                     		 		else :
                      				// no rows found
                      			endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="get-quote">
    <h6>Guardian Booth</h6>
    <h2><?php the_field('call_to_action_title',get_the_ID());?></h2>
    <a href="<?php the_field('call_to_action_button_link',get_the_ID());?>" class="btn btn-white get-quote-btn"><?php the_field('call_to_action_button_text',get_the_ID());?></a>
</section>
<?php /* ?>
<section class="map-section-contact">
<h3 class="hidden">contact map</h3>
   <div class="contact-map">
    <div id="map"></div>
</div> 
</section>
<?php */ ?>

<?php get_footer();?>