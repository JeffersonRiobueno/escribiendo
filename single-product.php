<!-- Archivo de cabecera gobal de Single Product -->
<?php get_header(); ?>
<?php if ( have_posts() ) : the_post(); ?>
      
<section class="page  page-product">
    <div class="cont-post">
        <?php the_content(); ?>
    </div>
</section>

<?php else : ?>
  <p><?php _e('Ups!, esta entrada no existe.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>