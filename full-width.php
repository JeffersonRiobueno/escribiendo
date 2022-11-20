<?php 
/**
 * Template Name: Plantilla de Full Width
 */ 
get_header(); ?>
<!-- Contenido de página de inicio -->
<div class="fondo_page">
  <div class="post page full-width">
    <h1><?php the_title(); ?></h1>
    <div class="content ">
      <?php if ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>