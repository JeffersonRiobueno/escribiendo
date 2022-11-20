<!-- Archivo de cabecera gobal de Page -->
<?php get_header(); ?>
<!-- Contenido de página de inicio -->

<section class="post page">
  <h1><?php the_title(); ?></h1>
  <?php if ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endif; ?>
  </div>

</section>

<!-- Archivo de barra lateral por defecto -->

<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>