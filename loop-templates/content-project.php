<?php
/**
 * project post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">


    <?php the_title( '<h1 class="alt-proj-title">', '</h1>' ); ?>   		

	</header><!-- .entry-header -->


<div class="row">
    <div class="col-md-5">
      <div class="alt-proj-description">
        <?php the_content(); ?>
      </div>
              
      <?php if(get_field('site_url')): ?>
              <button class="btn btn-default alt-proj-button"><a href="<?php the_field('site_url');?>">Go to the project</a></button>            
      <?php endif; ?>
      <!--FACULTY-->
      <div class="alt-proj-faculty row">
        <div class="col-md-12"><h3>Faculty:</h3></div>
       

        <?php 
        //get emails for query
        $terms = get_the_terms( get_the_ID(),'emails');
        $fac_email = [];
        if($terms){
          foreach ($terms as $term) {
            $fac_email[] = $term->slug;
          }
        }
        ?>

       <?php         
          // args
          $args = array(
            'numberposts' => -1,
            'post_type'   => 'faculty',
            'tax_query' => array(
            array(
              'taxonomy' => 'emails',
              'field'    => 'slug',
              'terms'    => $fac_email,
            ),
          ),
            
          );


          // query
          $the_query = new WP_Query( $args );

          ?>
          <?php if( $the_query->have_posts() ): ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <!--faculty-->
              <div class="alt-proj-faculty-member col-md-6">   
                <a href="<?php the_permalink(); ?>">             
                  <img class="alt-proj-faculty-thumb" src="<?php the_post_thumbnail_url('thumbnail');?>">
                  <div class="alt-proj-faculty-details">
                    <div class="alt-proj-faculty-name fromLeft">
                      <?php the_title(); ?>
                    </div>
                    <div class="alt-proj-faculty-school"><?php getFacultyDept($id); ?></div>
                  </div>
                </a> 
              </div> 
            <!--end faculty--> 
            <?php endwhile; ?>
          <?php endif; ?>

          <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

         
          
      </div>
<!--END FACULTY-->      
      
      <!--Project meta-->
      <div class="alt-proj-meta">
        <div class="row">
          <div class="col-md-6 alt-proj-concepts"><h3>Concepts:</h3> 
            <?php

			// vars	
			$concepts = get_the_terms( get_the_ID(), 'concepts' );


			// check
			if( $concepts ): ?>
			<ul>
				<?php foreach( $concepts as $concept ): ?>
          <li><a href="<?php echo get_site_url().'/concept/'.$concept->slug; ?>"><?php echo $concept->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

          </div>
          <div class="col-md-6 alt-proj-tools"><h3>Tools:</h3>
           <?php
            $tools = get_the_terms( get_the_ID(), 'tools' );

			// check
			if( $tools ): ?>
			<ul>
				<?php foreach( $tools as $tool ): ?>
					<li><a href="<?php echo get_site_url().'/tool/'.$tool->slug; ?>"><?php echo $tool->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
          </div>
        </div>
      </div>  
      <!--end project meta-->
    </div>
    <!--closing main text content col-->
    <!--Project Image-->
    <div class="col-md-7">
		    <?php  if ( has_post_thumbnail()) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
            the_post_thumbnail('large', ['class' => 'img img-fluid alt-proj-img align-right', 'title' => 'Screens hot of the website].']);
         } else {
          echo '<img src="'. get_stylesheet_directory_uri() . '/imgs/UnderConstruction.png" class="img img-fluid alt-proj-img align-right"><img src="'. get_stylesheet_directory_uri() . '/imgs/WalkingCone.gif" class="img img-fluid" id="cone">';
        } ?>
    </div>
  </div>
  <!--end main row-->
  
  <!--project data -->
    <div class="row alt-proj-data">
      <div class="col-md-12"><h3>Project Data<i data-toggle="tooltip" data-placement="top" title="These are some auto-generated stats that we found interesting and thought we'd share." class="fa fa-question-circle-o alt-proj-question" aria-hidden="true"></i></h3>
      </div>
       <!-- days -->
      <div class="col-md-2 col-sm-6">
        <i class="fa fa-calendar-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The total number of days involved in creating this project."></i>
        Days: <span class="alt-proj-numbers" id="day-count"><?php echo dayCounter();?></span>
      </div>
      
        <!-- emails -->
      <div class="col-lg-2 col-md-3 col-sm-6">
        <i class="fa fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="All the emails shared about this project"></i>
        Emails: <span class="alt-proj-numbers" id="email-count" data-hash="<?php echo '#'.$post->post_name; ?>"></span></div>

        <!-- slack -->      
      <div class="col-lg-2 col-md-3 col-sm-6"><?php echo slackUrl($post->post_name); ?><i class="fa fa-slack" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Slack messages exchanged regarding this project"></i></a>
         Slack:<span class="alt-proj-numbers"><?php echo slackCounter($post->post_name); ?></span>
      </div>
      
        <!-- google drive -->      
      <div class="col-lg-2 col-md-3 col-sm-6">
       <i class="fa fa-files-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Google Drive files associated with this project"></i>
        Drive: <span class="alt-proj-numbers" id="gdrive-count" data-hash="#<?php echo $post->post_name; ?>"></span></div>
      
        <!-- github  needs some extra room-->
      <div class="col-lg-4 col-md-4 col-sm-6">
       <i class="fa fa-file-code-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Bytes worth of data in the GitHub repository"></i>
        Bytes of Code: <span class="alt-proj-numbers" id="git-count" data-repo="<?php echo $post->post_name; ?>"></span></div>
  </div> 
  <!--End project data-->
</div>

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
