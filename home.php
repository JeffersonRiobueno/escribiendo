<?php get_header(); ?>
<section class="contenedor-blog noticias"> 

  <section class="post">
  
 <?php 
    //query_posts('category_name=Exitos&posts_per_page=6');

    while ( have_posts() ) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="article">
      <?php  //the_post_thumbnail(0); 
      $thumbID = get_post_thumbnail_id( $post->ID );
      $imgDestacada = wp_get_attachment_image_src( $thumbID, 'medium' ); // Sustituir por thumbnail, medium, large o full
      ?>
      <div class="img" style="background-image: url(<?php echo "$imgDestacada[0]"; ?>);">
      </div>
      <div class="box-texto">
        <span class="fecha" datatime="<?php the_time('Y-m-j');?>"><?php the_time('j F Y'); ?></span>
        <h3><?php the_title(); ?></h3>
        <p><?php echo substr(strip_tags($post->post_content), 0, 100)."...";?></p>
      </div>
     
    </a>
  <?php endwhile; ?>

  <div class="pagination">
    <?php $total = $wp_query->max_num_pages;
    // solo seguimos con el resto si tenemos más de una página
    if ( $total > 1 )  {
         // obtenemos la página actual
         if ( !$current_page = get_query_var('paged') )
              $current_page = 1;
         // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
         $permalink_structure = get_option('permalink_structure');
         $format = empty( $permalink_structure ) ? '&page=%#%' : 'page/%#%/';
         //$format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
         echo paginate_links(array(
              'base' => get_pagenum_link(1) . '%_%',
              'format' => $format,
              'current' => $current_page,
              'prev_next' => True,
              'prev_text' => __('&laquo; Anterior'),
              'next_text' => __('Siguiente &raquo;'),
              'total' => $total,
              'mid_size' => 4,
              'type' => 'list'
         ));
    } ?>

  </div>
  
  </section>
<!--  <section class="sidebar">
    <div id="sidebar-primary" class="sidebar">
      <?php dynamic_sidebar( 'primary' ); ?>
    </div>
  </section>
  -->

  
</section>
<?php get_footer(); ?>
