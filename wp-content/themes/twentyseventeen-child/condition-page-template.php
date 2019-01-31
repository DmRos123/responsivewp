<?php
/**
* Template Name: condition-page-template
*/

get_header(); ?>

<!---<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
--->
<div class="condition-page">
	<div class="double-stuff">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

        

			endwhile; // End of the loop.

			?>
	</div>	
	<!---<script>getElementById('conditionID');</script>--->	
	<?php 


			
		
			
		/*

       $uri = $_SERVER['REQUEST_URI'];
       preg_match('/\d+/',$uri, $match);
       $pg = implode('',$match);
 
       $myconditionsum = $pg;

    if(! is_numeric($myconditionsum)) {
        global $post;
      	$myconditionsum = get_post_meta($post->ID, 'condition_id', true);

      }

*/
   
        global $post;
      	$myconditionsum = get_post_meta($post->ID, 'condition_id', true);

  
 
			
	


      
 
       include('condition-altdisplay-template.php');
  
		?>

<!--
		</main> #main -->

<!--	</div> #primary -->
<!--</div> .wrap -->

</div>

	
<?php get_footer();
