<!-- Archivo de cabecera gobal de Single -->
<?php get_header(); ?>
<?php if ( have_posts() ) : the_post(); ?>
<?php  //the_post_thumbnail(0); 
        //$thumbID = get_post_thumbnail_id( $post->ID );
        //$imgDestacada = wp_get_attachment_image_src( $thumbID, 'large' ); // Sustituir por thumbnail, medium, large o full
          // dentro del loop no es necesario pasar el $post ID
          //$custom_fields = get_post_custom();
          $category = get_the_category();
        ?>
      <section class="wrap">
        <div class="content">
          <div class="bloque_articulo">
            <div class="post">
              <h1><?php the_title(); ?></h1>
              <div class="fila">
                  <span><?php the_time('j F, Y'); ?></span>
                  <span class="cat"> | <?php echo $category[0]->cat_name; ?></span>
              </div>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <div class="sidebar">
          <?php include 'template-sidebar.php'; ?>
        </div>
      </section>


<?php else : ?>
  <p><?php _e('Ups!, esta entrada no existe.'); ?></p>
<?php endif; ?>
<!-- Archivo de barra lateral por defecto -->
<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>