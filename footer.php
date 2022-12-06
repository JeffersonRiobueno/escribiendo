<?php wp_footer(); ?>

<footer>
	<div class="fila">
    <div class="box img">
      <img src="<?php echo get_template_directory_uri().'/img/logo.png'?>" alt="">
    </div>
    <div class="box enlaces">
      <a href="<?php echo bloginfo('url')."/shop";?>" target="_blank">Tienda</a>
      <a href="<?php echo bloginfo('url')."/acerca-de/";?>" target="_blank">Acerca de...</a>
      <a href="<?php echo bloginfo('url')."/politica-de-privacidad";?>" target="_blank">Política  de Privacidad</a>
      <a href="<?php echo bloginfo('url')."/politica-de-devoluciones";?>" target="_blank">Política de devoluciones</a>
    </div>
    <div class="box">
      <aside>
        <a href="">
          <img src="<?php echo get_template_directory_uri().'/img/fb.png'?>" alt="">
        </a>
        <a href="">
          <img src="<?php echo get_template_directory_uri().'/img/ig.png'?>" alt="">
        </a>
        <a href="">
          <img src="<?php echo get_template_directory_uri().'/img/telegram.png'?>" alt="">
        </a>
       
      </aside>
      <p>© EscribiendoEnConexion 2022</p>
    </div>
  </div>
</footer>

<script>
  var elemento = document.getElementById("menu");
  function openMenu(){
    elemento.classList.remove('menuMovil');

  }

  function closeMenu(){
    elemento.classList.add('menuMovil');
  }
 
</script>