<?php if(!class_exists('Rain\Tpl')){exit;}?>	<!--Carousel Wrapper-->
<div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
    <li data-target="#video-carousel-example2" data-slide-to="1"></li>
    <li data-target="#video-carousel-example2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!-- First slide -->
    <div class="carousel-item active">
      <!--Mask color-->
      <div class="view">
        <!--Image source-->
        <img src="/resources/site/img/red1.gif" alt="" width="100%" height="100%">
        <div class="mask rgba-black-strong"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInDown">
          <h3 class="h3-responsive">Os melhores jogos!</h3>
          <p>Na Geek Store você encontra os títulos mais famosos.</p>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.First slide -->

    <!-- Second slide -->
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <!--Image source-->
        <img src="/resources/site/img/tlou3.gif" alt="" width="100%" height="100%">
        <div class="mask rgba-black-strong"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInDown">
          <h3 class="h3-responsive">Conteúdos esclusivos!</h3>
          <p>Complete sua coleção com os itens mais desejados.</p>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.Second slide -->

    <!-- Third slide -->
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <!--Image source-->
        <img src="/resources/site/img/zero1.gif" alt="" width="100%" height="100%">
        <div class="mask rgba-black-strong"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInDown">
          <h3 class="h3-responsive">A melhor experiência com garantia de 1 ano!</h3>
          <p>Adquira seus produtos sem medo! A Geek Store oferece garantia de até um ano em todo o site.</p>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.Third slide -->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
  <!--/.Controls-->
</div>
<!--Carousel Wrapper-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color deep-purple darken-2 mt-3 mb-5">

        <!-- Navbar brand -->
        <span class="navbar-brand">Categorias:</span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Games</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Consoles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Colecionáveis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Roupas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acessórios</a>
            </li>

          </ul>
          <!-- Links -->

          <form class="form-inline">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            </div>
          </form>
        </div>
        <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->

      <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product ">
                       <!-- <h2 class="section-title">Produtos</h2> -->
                       <h2 class="product-bit-title text-center">Produtos</h2>
                        <!--<div class="product-carousel">
                          <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo htmlspecialchars( $value1["des_photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="#" class="add-to-cart-link text-success"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                        <a href="/products/<?php echo htmlspecialchars( $value1["des_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                    </div>
                                </div>
                                
                                <h2><a class="text-secondary" href="/products/<?php echo htmlspecialchars( $value1["des_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="font-size: 25px"><?php echo htmlspecialchars( $value1["des_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                                
                                <div class="product-carousel-price">
                                  <h5 class="font-weight-bold purple-text">
                                      <strong>R$ <?php echo formatPrice($value1["price"]); ?></strong>
                                  </h5>
                              </div>
                            </div>
                            <?php } ?>

                        </div>-->

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
                                
                                <div class="product-option-shop">
                                    <a style="font-size: 20px" class="add_to_cart_button text-success" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Comprar</a>
                                </div>                       
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

      <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">

          <!--Arrow left-->
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <li class="page-item active">
            <a class="page-link" href="#">1
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">5</a>
          </li>

          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->

