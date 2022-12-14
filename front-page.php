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
						<p>tengo un profundo interés por las palabras como herramienta de autoconocimiento y, escribir es parte de mi vida cotidiana.</p>
						<p>Las palabras más que letras son el camino para descubrir nuestro mundo interno y llegar a la comprensión de la realidad que hemos cocreado.</p>
						<p>Tengo un proyecto llamado escribiendo en conexión en el cual promuevo el APRENDIZAJE como un canal de trasformación personal en pro del bienestar integral.</p>
					</div>
				<a href="/la-palabra-como-semilla/" class="btn">Conocer programa</a>

				</div>
			</div>
		</div>
		<div class="podcast">
			<h2>Podcast</h2>
			<h2>PALABRAS en MOVIMIENTO</h2>

			<div class="content">
				<div class="box box1">
					<p>Un espacio en el que a través de conversaciones reflexionamos sobre las palabras que de una u otra forma han dejado huellas en nuestras vidas.
					<p>Definiciones que están ligadas más que a experiencias personales, a historias que nos contaron: creencias sostenidas por la familia, cultura, religión y educación, que en la actualidad piden:
					<ul>
						<li>Resignificar conceptos.</li>
						<li>Mirar con nuevos ojos.</li>
						<li>Cambiar la percepción para generar la transformación personal y disfrutar la vida desde la resiliencia y con una fuerza serena en el corazón.</li>
					</ul>
   


				</div>
				<div class="box box2">
					<a href="https://open.spotify.com/show/69F1blfhieEwTOOTxOkemp" style="background-image: url(<?php echo get_template_directory_uri().'/img/spotify.jpg'?>);" target="_blank"></a>
				</div>
				<div class="box box3">
					<a href="https://anchor.fm/palabrasenmovimiento" style="background-image: url(<?php echo get_template_directory_uri().'/img/anchor.jpg'?>);" target="_blank"></a>
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
