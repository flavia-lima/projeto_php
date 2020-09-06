<?php if(!class_exists('Rain\Tpl')){exit;}?><div style="margin-top: 100px;"></div>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Detalhes do Produto</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="product-breadcroumb"> <br/><br/>
                        <a href="/">Home</a><br/>
                        <a href=""><?php echo htmlspecialchars( $product["des_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><br/>
                    </div>
                    
                    <br/>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="<?php echo htmlspecialchars( $product["des_photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo htmlspecialchars( $product["des_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2><br/>
                                <div class="product-inner-price font-weight-bold purple-text">
                                    <ins>R$ <?php echo formatPrice($product["price"]); ?></ins>
                                </div>    
                                
                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div><br/>
                                    <button class="add_to_cart_button btn btn-success" type="submit">Comprar</button>
                                </form>   
                                
                                <div class="product-inner-category text-secondary" style="font-size: 15px">
                                    <p>Categorias:<?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?> <a href="/categories/<?php echo htmlspecialchars( $value1["id_category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["des_category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><?php } ?>.
                                </div>  

                                <!-- Collapse buttons -->
                                <div>
                                  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                                    aria-controls="multiCollapseExample1">Descrição</a>
                                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2"
                                    aria-expanded="false" aria-controls="multiCollapseExample2">Avaliações</button>
                                </div>
                                <!--/ Collapse buttons -->

                                <!-- Collapsible content -->
                                <div class="row">
                                  <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                      <div class="card card-body">
                                        <h2>Descrição do Produto</h2>  
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                      <div class="card card-body">
                                        <h2>Avaliações</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Nome</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Sua avaliação</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Comentar</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Enviar"></p>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <br/><br/><br/>
                                <!--/ Collapsible content -->
                                
                                <!--<div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Avaliações</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Descrição do Produto</h2>  
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                
                            </div>
                        </div>
                    </div>
                    
                </div>                    
            </div>
        </div>
    </div>
</div>