<div class="block">
			<h4>Temas</h4>
			
			<a href="<?php echo bloginfo('url')."/category/docker/";?>" class="box2"> 
				<div class="text" style="background-image: url(<?php echo get_template_directory_uri()."/img/cat-docker.jpg";?> )"></div>
			</a>
			
			<a href="<?php echo bloginfo('url')."/category/devops/";?>" class="box2"> 
				<div class="text" style="background-image: url(<?php echo get_template_directory_uri()."/img/cat-dev.jpg";?> )"></div>
			</a>
			<a href="<?php echo bloginfo('url')."/category/terminal/";?>" class="box2"> 
				<div class="text" style="background-image: url(<?php echo get_template_directory_uri()."/img/cat-bash.jpg";?> )"></div>
			</a>
			

		</div>
		<div class="block">
			<h4>Ultimos articulos</h4>
			
			<?php 
				query_posts('posts_per_page=3');

				while ( have_posts() ) : the_post();  
					$thumbID = get_post_thumbnail_id( $post->ID );
					$imgDestacada = wp_get_attachment_image_src( $thumbID, 'large' ); // Sustituir por thumbnail, medium, large o full
					?>
					<a href="<?php the_permalink(); ?>" class="box"> 
						<div class="img" style='background-image: url(<?php echo "$imgDestacada[0]"; ?>);'>
						</div>
						<div class="text"><?php the_title(); ?></div>
					</a>
			<?php endwhile; ?> 
			
			
		</div>