<?php
	get_header();
?>
<div class="wrap">
	<div class="content">
		<div class="bloque_noticia">

			<?php 
   //     $category = get_the_category();
   //     echo $category[0]->term_id;


      // Custom query.
        $query = new WP_Query( $args );
				while ( have_posts() ) : the_post();  
					$thumbID = get_post_thumbnail_id( $post->ID );
					$imgDestacada = wp_get_attachment_image_src( $thumbID, 'large' ); // Sustituir por thumbnail, medium, large o full
					$category = get_the_category();
					
          ?>
					<a href="<?php the_permalink(); ?>" class="box_noticia">
						<article>
							<div class="img" style='background-image: url(<?php echo "$imgDestacada[0]"; ?>);'></div>
							<div class="text">
								<p><?php the_title(); ?></p>
								<span class="cat"><?php echo $category[0]->cat_name; ?></span>

							</div>
						</article>
					</a>
			<?php 
        endwhile; 
        wp_reset_postdata();
      ?>  
			
		</div>
	</div>
	<div class="sidebar">
       <?php include 'template-sidebar.php'; ?>
	</div>
</div>




<?php get_footer(); ?>
