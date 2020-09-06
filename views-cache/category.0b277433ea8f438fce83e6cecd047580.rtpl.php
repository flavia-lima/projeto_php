<?php if(!class_exists('Rain\Tpl')){exit;}?><div style="margin-top: 100px;"></div>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $category["des_category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<br/><br/>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="<?php echo htmlspecialchars( $value1["des_photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    </div>
                    <h2><a class="text-secondary" href="/products/<?php echo htmlspecialchars( $value1["des_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="font-size: 25px"><?php echo htmlspecialchars( $value1["des_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                    <div class="product-carousel-price">
                        <h4 class="font-weight-bold purple-text">
                            <strong>R$ <?php echo formatPrice($value1["price"]); ?></strong>
                        </h4>
                    </div>  
                    
                    <!--<div class="product-option-shop">
                        <a style="font-size: 20px" class="add_to_cart_button text-success" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Comprar</a>
                    </div>-->                       
                </div>
            </div>
            <?php } ?>
        </div>
        
        <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">


          <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
          <li class="page-item">
            <a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php } ?>

        </ul>
      </nav>
      <!--Pagination-->
    </div>
</div>