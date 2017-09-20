<?php
/**
 * Template Name: Home Page
 *
 * Template for ALT Lab's home sweet home page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div id="home-wrapper">
	<div class="container" id="home-content">
	<!--Top logo Section-->
	  <div class="top-logo-area">
	    <div class="row home-page">
	      <div class="col-md-6 wavy">
	        <img src="<?php echo get_stylesheet_directory_uri();?>/imgs/callout-balloon.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/callout-ballon.png" class="comment-bubble"</>
	        <div class="alt-lab-stacked">ALT LAB</div>
	        <div class="alt-lab-spelled-out">Academic Learning Transformation Lab</div>
	      </div>
	      <div class="col-md-6">
	        <img src="<?php echo get_stylesheet_directory_uri();?>/imgs/gear.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/gear.png" class="gear">
	        <img src="<?php echo get_stylesheet_directory_uri();?>/imgs/handoutline.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/handoutline.png" class="hand">
	        <?php while ( have_posts() ) : the_post(); ?>
				<?php the_content();?>
	        <?php endwhile; // end of the loop. ?>
					<div class="learn-more"><a href="#help">Learn more</a></div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<!--End Top logo Section-->

<div class="container-fluid" id="home-container">
  <div class="container white">
    <div class="content">
      <div class="row nav">
        <div class="col-md-3 col-sm-6 border-time-left">
          <div class="row row-eq-height border-time-bottom">
          	  <div class="col-sm-12 home-title">
          		   <a href="../altlabnew/project/">Projects</a>
          	  </div>
	          <div class="col-sm-12 home-details home-details-projects">
	          	See what VCU faculty are doing with us on Rampages and beyond.
	          </div>
	          <div class="col-sm-12 home-projects-content">
	          	<?php
	          	$args = array(
	          		'post_type' => 'project',
	          		'posts_per_page' => 3,
	          		'orderby' => 'rand',
	          		'meta_key' => '_thumbnail_id',
	          		);
	          	$the_query = new WP_Query( $args );
				// The Loop
				if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
					  // Do Stuff
				    echo '<div class="border-time-center project-sites"><a href="'. get_permalink() .'">';
						the_post_thumbnail('medium', ['class' => 'img-responsive home-project-img', 'title' => 'Feature image']);
					echo '</a></div>';
				endwhile;
				endif;
				// Reset Post Data
				wp_reset_postdata();
	          	?>
	          </div>
	        </div>
        </div>
        <div class="col-md-3 col-sm-6 border-time-left border-time-center">
          	<div class="row">
          	 <div class="col-sm-12 home-title">
          	  <a href="../altlabnew/events/">Events</a>
          	 </div>
	         <div class="col-sm-12 home-details">
	          	ATTEND UPCOMING ALT LAB EVENTS OR CONTACT US TO SCHEDULE ONE WITH YOUR GROUP.
	          </div>
	          <div class="col-sm-12 home-details-content border-time-center">
	          	<?php echo do_shortcode('[tribe_events_list]');?>
	          </div>
	        </div>
	     </div>
       <div class="col-md-3 col-sm-6 border-time-left border-time-center">
          <div class="row">
          	<div class="col-sm-12 home-title">
          	  	<a href="../altlabnew/resources/">Resources</a>
          	 </div>
	          <div class="col-sm-12 home-details">
	          	Find our other online resources and get support when and where you need it.
	          </div>
	          <div class="col-sm-12 home-resources-content">
							<div class="home-resources-content border-time-center" id="online-logo">
	          	  <a class="swap" href="https://online.vcu.edu">
									<img class="img-responsive home-resources-img" src="<?php echo get_stylesheet_directory_uri();?>/imgs/online-vcu-black.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/online-vcu-black.png">
									<img class="img-responsive home-resources-img" src="<?php echo get_stylesheet_directory_uri();?>/imgs/online-vcu-color.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/online-vcu-color.png">
								</a>
							</div>
							<div class="home-resources-content border-time-center home-resources-img">
								<a href="https://rampages.us">Course Design</a>
							</div>
							<div class="home-resources-content border-time-center home-resources-img">
								<a href="https://rampages.us">RAM PAGES</a>
							</div>
							<div class="home-resources-content border-time-center home-resources-img">
								<a href="https://rampages.us">FAQs</a>
							</div>
							<div class="home-resources-content border-time-center home-resources-img">
	          	  	<a class="swap" href="https://rampages.us">Stats!
										<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/stats-graph.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/stats-graph.png">
										<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/stats-graph-aqua.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/stats-graph-aqua.png">
									</a>
								<div class="home-tiny-details">See data about our data!</div>
							</div>
	          </div>
	        </div>
        </div>
        <div class="col-md-3 col-sm-6 border-time-right">
          <div class="row">
          	  <div class="col-sm-12 home-title">
          	  	<a href="../altlabnew/about-us/">About Us</a>
          	  </div>
	          <div class="col-sm-12 home-details home-details-aboutus">
	          	Get to know us a little bit and then let’s make something together.
	          </div>
	          <div class="col-sm-12 home-about-content">
	          	<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/building01.png" class="img-responsive"></div>
	          </div>
	          <div class="col-sm-12 home-details-content home-us-image">
							<?php
	          	$args = array(
	          		'post_type' => 'faculty',
	          		'posts_per_page' => 10,
	          		'orderby' => 'rand',
	          		'meta_key' => '_thumbnail_id',
	          		);
	          	$the_query = new WP_Query( $args );
				// The Loop
				if ( $the_query->have_posts() ) :
					echo '<div class="row">';
				while ( $the_query->have_posts() ) : $the_query->the_post();
					  // Do Stuff
				    echo '<div class="col-md-4 col-sm-4 col-xs-4 home-us-image"><a href="'. get_permalink() .'">';
						the_post_thumbnail('thumbnail', ['class' => 'img-responsive home-faculty-img', 'title' => 'Feature image']);
					echo '</a></div>';
				endwhile;
				echo '</div>';
				endif;
				// Reset Post Data
				wp_reset_postdata();
	          	?>
	          </div>
	        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Top Content Section-->

<!--Main items Section-->
<div class="home-wrapper-below">
	<div class="container">
			<div class="col-md-6 wavy">
				<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/wrench.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/wrench.png" class="wrench">
				<div id="help"></div>
	      	<div class="question-answered">
						<span class="highlight">
							We can help you:
						</span>
					</div>
			</div>
	</div>
</div>
<div class="home-wrapper-below">
	<div class="container home-content-below col-sm-10 col-sm-offset-2">
	    <div class="row">
					<div class="col-sm-4 home-content-below what-we-can-do-title">
						<div class="row">
							<div class="col-sm-12 home-content-below">
								<div class="image-below"><img src="<?php echo get_stylesheet_directory_uri();?>/imgs/timeclock-black.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/timeclock-black.png"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 home-content-below home-content-below-title">Free up your time</div>
						</div>
						<div class="line"></div>
								<div class="row">
									<div class="col-sm-12 home-content-below what-we-can-do-text"><p>The Internet is a big place. We'll explore fertile grounds for multimedia content, advanced search patterns to find better content faster, and ways to save and organize all the great things you've found.</p><p>Learn techniques that will make your searching more effiecent.</p>
									</div>
								</div>
					</div>
					<div class="col-sm-4 home-content-below what-we-can-do-title">
						<div class="row">
							<div class="col-sm-12 home-content-below">
								<div class="image-below"><img src="<?php echo get_stylesheet_directory_uri();?>/imgs/lightbulb-black.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/lightbulb-black.png"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 home-content-below home-content-below-title">Help students learn</div>
						</div>
						<div class="line"></div>
								<div class="row">
									<div class="col-sm-12 home-content-below what-we-can-do-text"><p>The term "active learning" has been ballyhooed for some time now in higher education. It is often used as an umbrella term for a vast range of activities and techniques that endeavor to get students to do more in the classroom than just take notes, and to do more outside of the classroom than just memorize their notes.</p><p>This workshop is designed to provide participants with a research-based rationale for why active learning works, an introduction to a wide range of techniques that are suitable to various contexts, and a better understanding of how to select active learning techniques based on one's learning outcomes.</p>
									</div>
								</div>
					</div>
					<div class="col-sm-4 home-content-below what-we-can-do-title">
						<div class="row">
							<div class="col-sm-12 home-content-below">
								<div class="image-below"><img src="<?php echo get_stylesheet_directory_uri();?>/imgs/sparkles-black.svg" onerror="this.onerror=null; this.src="<?php echo get_stylesheet_directory_uri();?>/imgs/sparkles-black.png"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 home-content-below home-content-below-title">Inspire innovation</div>
						</div>
						<div class="line"></div>
									<div class="row">
										<div class="col-sm-12 home-content-below what-we-can-do-text"><p>Learn how a Rampages.us site can enrich your course, whether it's an online one or a hybrid. Expand beyond the tools you may already know about and try some new innovative experiential techniques to engage with your students.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
										</div>
									</div>
						</div>
					</div>
	  	</div>
	</div><!-- Wrapper end -->

<div><!-- Wrapper begin again -->
	<div class="home-wrapper-below home-content">
		<div class="container home-content-below col-sm-10 col-sm-offset-2">
			<div class="faq-below-nav">
				<a href="#top">
					<i class="fa fa-arrow-circle-down fa-3x">
					</i>
				</a>
			</div>
		</div>
	</div>
</div><!-- Wrapper end -->





<?php get_footer(); ?>
