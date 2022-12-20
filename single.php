<!-- Archivo de cabecera gobal de Single -->
<?php get_header(); ?>

<!-- Contenido del post -->
<?php if ( have_posts() ) : the_post(); ?>
<?php  //the_post_thumbnail(0); 
        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_image_src( $thumbID, 'large' ); // Sustituir por thumbnail, medium, large o full
          // dentro del loop no es necesario pasar el $post ID
          //$custom_fields = get_post_custom();
          $category = get_the_category();
        ?>
      
<section class="entrada">

  <section class="post">
      <figure style="background-image: url('<?php echo "$imgDestacada[0]"; ?>');">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
      </figure>

      <div class="cont-post">
        <div class="datos">
          <div class="cat"><?php echo $category[0]->cat_name; ?></div> 
          <div class="fecha"><?php the_time('j F, Y'); ?></div>
        </div>

         <?php the_content(); ?>

        </div>
      </div>
      
  </section>

</section>

<?php else : ?>
  <p><?php _e('Ups!, esta entrada no existe.'); ?></p>
<?php endif; ?>
<!-- Archivo de barra lateral por defecto -->
<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>