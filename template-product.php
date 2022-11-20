<a class="item-product" href="<?php the_permalink();?>">
<?php
	if ($product->get_type() != 'simple') {
		$product_variations = $product->get_available_variations();
		#2 Get one variation id of a product
		$variation_product_id = $product_variations [0]['variation_id'];
		#3 Create the product object
		$variation_product = new WC_Product_Variation( $variation_product_id ); 
		#4 Use the variation product object to get the variation prices
		$sale_price = $variation_product->sale_price;
		$regular_precio = $variation_product->regular_price;
	} else {
		$sale_price = $product->get_sale_price();
		$regular_precio = $product->get_regular_price();
	};
		if ($product->is_on_sale()) {			
			$discount_rate = (((($sale_price)*100)/$regular_precio)-100);
			
			echo apply_filters(
				'woocommerce_sale_flash',
				sprintf(
					'<span class="onsale">%s</span>',
					esc_html( round( $discount_rate, 0, PHP_ROUND_HALF_DOWN).'%')),
					$product);
				};
			if ($product->is_on_sale()){
				$price_product = apply_filters(
					'woocommerce_get_price_html',
					sprintf('
					<ins class="price-old-product on_sale">S/%s</ins>
					<del class="price-current-product ">S/%s</del>
',
					esc_html($regular_precio),
					esc_html($sale_price)),
					$product);
			}else{
				$price_product = apply_filters(
					'woocommerce_get_price_html',
					sprintf('<del class="price-current-product">S/%s</del>',
					esc_html($regular_precio)),
					$product);
			};
			
			$thumbID = get_post_thumbnail_id( $post->ID );
			$imgDestacada = wp_get_attachment_image_src( $thumbID, 'medium' ); 
			?>

	    <div class="img">
            <img class="img" alt="<?php the_title();?>" src="<?php echo $imgDestacada[0]; ?>">
            <div class="more-product">Vista previa</div>
        </div>
		<div class="text">		
			<h2 class="title-item-product" ><?php the_title(); ?></h2>
			<div  class="price"><?php echo $price_product; ?></div>
		</div>
</a>