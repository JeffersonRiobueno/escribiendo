<?php get_header(); ?>

  <section class="search">
    <div class="content">
      <h2>Resultados de búsqueda para <strong><?php echo get_search_query() ?></strong></h2>
      <div class=" container-products">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); 
                      include 'template-product.php';

          endwhile; ?>
          <?php else : ?>
            <p><?php _e('Ups!, no hay entradas.'); ?></p>
          <?php endif; ?>
      </div>
    </div>
    <section class="sidebar">
      <div id="sidebar-primary" class="sidebar">
        <?php dynamic_sidebar( 'primary' ); ?>
      </div>
    </section>
    
  </section>
  <div class="pagination">
      <span class="in-left"><?php next_posts_link('« Entradas antiguas'); ?></span>
      <span class="in-right"><?php previous_posts_link('Entradas más recientes »'); ?></span>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>