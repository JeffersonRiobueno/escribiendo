<?php
//wp_set_password( '4bcuenta--01', 1 );

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );



function header_menus() {
  register_nav_menus(
    array(
      'navegation' => __( 'Menú header' ),
      'navegation_movil' => __( 'Menú movil' ),
    )
  );
}
add_action( 'init', 'header_menus' );

/**
 * Crear una zonan de widgets que podremos gestionar
 * fácilmente desde administrador de Wordpress.
 */


function sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
      );
    /* Repeat register_sidebar() code for additional sidebars. */
}
function sidebars2() {
  /* Register the 'primary' sidebar. */
  register_sidebar(
      array(
          'id'            => 'primary2',
          'name'          => __( 'Primary2 Sidebar' ),
          'description'   => __( 'A short description of the sidebar.' ),
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '<h4>',
          'after_title'   => '</h4>',
      )
    );
  /* Repeat register_sidebar() code for additional sidebars. */
} 
add_action( 'widgets_init', 'sidebars' );
add_action( 'widgets_init', 'sidebars2' );


// Modicado por Jeff MetaDatos
function theme_xyz_header_metadata() {
	global $product;
?>
	<meta name="og:type" content="product" />
    <meta name="product:brand" content="RiobuenoShop" />
    <meta property="product:availability" content="<?php echo $product->stock_status; ?>">
    <meta property="product:condition" content="new">
    <meta property="product:price:currency" content="PEN">
    <meta property="product:visibility" content="published">
    <meta property="product:retailer_item_id" content="<?php echo $product->sku; ?>">
    <meta property="product:price:amount" content="<?php echo $product->price; ?>">
<?php 
}
//add_action( 'wp_head', 'theme_xyz_header_metadata' );
// Modicado por Jeff Fin





add_action('phpmailer_init','send_smtp_email');
function send_smtp_email( $phpmailer )
{
    // Define que estamos enviando por SMTP
    $phpmailer->isSMTP();
 
    // La dirección del HOST del servidor de correo SMTP p.e. mail.midominio.com o pa IP del servidor
    $phpmailer->Host = "smtp.gmail.com";
 
    // Uso autenticación por SMTP (true|false)
    $phpmailer->SMTPAuth = true;
 
    // Puerto SMTP - Suele ser el 25, 465 o 587
    $phpmailer->Port = "587";
 
    // Usuario de la cuenta de correo
    $phpmailer->Username = "riobuenoshop@gmail.com";
 
    // Contraseña para la autenticación SMTP
    $phpmailer->Password = "4bcuenta--01";
 
    // El tipo de encriptación que usamos al conectar - ssl (deprecated) o tls
    $phpmailer->SMTPSecure = "tls";
 
    $phpmailer->From = "riobuenoshop@gmail.com";
    $phpmailer->FromName = "RiobuenoShop";
}



/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );


function rb_cart_count($fragments){
  ob_start();
  ?>
  <span class="cant-cart">
  <?php echo WC()->cart->get_cart_contents_count();?>
</span>
  <?php
      $fragments['.cant-cart'] = ob_get_clean();
  return $fragments;
} 
add_filter( 'woocommerce_add_to_cart_fragments', 'rb_cart_count');

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_custom_content', 5 );

function woocommerce_template_custom_content(){
	echo "<h1>".get_the_title()."</h1>";
}