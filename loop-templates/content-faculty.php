<?php
/**
 * project post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">


    <?php the_title( '<h1 class="faculty-title">', '</h1>' ); ?>   		
    <div class="faculty-department"><?php getFacultyDept($id); ?> - <?php getFacultyTitle($id); ?></div>
	</header><!-- .entry-header -->
  <div class="row">
    <div class="faculty-bio col-md-4">
    	<?php 
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'faculty-bio-image responsive'));
        } else {

        }
        ?>
    </div>

    <div class="col-md-8 faculty-bio-content">  
    <?php the_content();?>
      <?php         
      $fac_email = wp_get_post_terms(get_the_ID(), 'emails');
          // args
          $args = array(
            'numberposts' => -1,
            'post_type'   => 'project',
           'tax_query' => array(
            array(
              'taxonomy' => 'emails',
              'field'    => 'slug',
              'terms'    => $fac_email[0]->name,
            ),
          ),
            
          );


          // query
          $the_query = new WP_Query( $args );

          ?>
      </div>
    </div>  
      <div class="faculty-projects row">  
      <div class="col-md-12"><h2>Projects</h2></div>
        <?php if( $the_query->have_posts() ): ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-md-6">
              <div class="faculty-project-item row">
                    <div class="col-lg-5 col-md-12">
                      <?php the_post_thumbnail('thumbnail', array('class' => 'faculty-project-item-image')); ?> 
                    </div>
                    <div class="col-lg-7 col-md-12">             
                      <a class="faculty-project-item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      <div class="faculty-project-item-excerpt"><?php the_excerpt();?></div>
                    </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

          <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
      </div>

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
