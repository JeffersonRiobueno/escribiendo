<?php
	get_header();
?>
<div class="wrap">
		<div class="banner">
			<?php echo do_shortcode('[smartslider3 slider="2"]');?>		
		</div>
		<div class="banner_movil">
            <?php  
                echo do_shortcode('[smartslider3 slider="3"]');
            ?>
        </div>
		<div class="about">
			<div class="box">
				<div class="img">
					<img src="<?php echo get_template_directory_uri().'/img/img_home.jpg'?>" alt="">
				</div>
				<div class="box_text">
					<div class="title">HOLA, Soy Carmen Goncalves, </div>
					<div class="text">
						<p>Tengo un profundo interés por las palabras como herramienta de autoconocimiento y, escribir es parte de mi vida cotidiana.</p>
						<p>Las palabras más que letras son el camino para descubrir nuestro mundo interno y llegar a la comprensión de la realidad que hemos cocreado.</p>
						<p>Tengo un proyecto llamado escribiendo en conexión en el cual promuevo la escritura como un canal de trasformación personal en pro del bienestar integral.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="podcast">
			<h2>Podcast PALABRAS en MOVIMIENTO</h2>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore saepe facilis dolores doloribus voluptate tempora ab necessitatibus! Repudiandae corrupti dolor ut distinctio expedita.</p>
			<div class="content">
				<div class="box box1">
					<a href="https://open.spotify.com/show/69F1blfhieEwTOOTxOkemp" style="background-image: url(<?php echo get_template_directory_uri().'/img/spotify.jpg'?>);" target="_blank"></a>
				</div>
				<div class="box box2">
					<a href="https://podcasts.apple.com/podcast/id1574563152?ign-itscg=30200&ign-itsct=lt_p	" style="background-image: url(<?php echo get_template_directory_uri().'/img/apple_podcasts.png'?>);" target="_blank"></a>
				</div>
				<div class="box box3">
					<a href="https://castbox.fm/channel/id4383370?utm_campaign=ex_share_ch&utm_medium=exlink&country=us" style="background-image: url(<?php echo get_template_directory_uri().'/img/Castbox.jpg'?>);" target="_blank"></a>
				</div>
			</div>
		</div>
		<div class="product_home">
			<?php echo do_shortcode('[product_page id="12"]');?>
			<div class="clear"></div>
		</div>

		<div class="bloque_destacado">	
				<div class="subtitulo">
					<h3>DESCUBRE LOS PRODUCTOS DE MI TIENDA</h3>
				</div>
				
				<?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" visibility="visible"]' );?>
			
			<a href="/shop/?btn=more" class="btn">Ver todo</a>
		</div>
</div>




<?php get_footer(); ?>
