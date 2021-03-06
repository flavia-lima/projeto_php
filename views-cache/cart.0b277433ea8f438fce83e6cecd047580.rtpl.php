<?php if(!class_exists('Rain\Tpl')){exit;}?><div style="margin-top: 100px;"></div>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Carrinho</h2>
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
                    <div class="woocommerce"><br/><br/><br/>

                        <form action="/checkout">
                            
                            <?php if( $error != '' ){ ?>
                            <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </div>
                            <?php } ?>

                            <table cellspacing="0" class="table table-striped table-hover shop_table cart">
                                <thead class="black white-text">
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name text-center">Produto</th>
                                        <th class="product-price text-center">Preço</th>
                                        <th class="product-quantity text-center">Quantidade</th>
                                        <th class="product-subtotal text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remover itens" class="remove btn-sm btn-danger text-center" role="button" href="/cart/<?php echo htmlspecialchars( $value1["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove">X</a> 
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="/products/<?php echo htmlspecialchars( $value1["des_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src=
                                                "<?php echo htmlspecialchars( $value1["des_photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="/product/<?php echo htmlspecialchars( $value1["des_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["des_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> 
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">R$ <?php echo formatPrice($value1["price"]); ?></span> 
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="button" class="minus btn-sm btn-primary" value="-" onclick="window.location.href = '/cart/<?php echo htmlspecialchars( $value1["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/minus'">

                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" min="0" step="1">

                                                <input type="button" class="plus btn-sm btn-primary" value="+" onclick="window.location.href = '/cart/<?php echo htmlspecialchars( $value1["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add'">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">R$ <?php echo formatPrice($value1["vltotal"]); ?></span> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table><br/><br/>

                            <div class="cart-collaterals">

                                <div class="cross-sells">

                                    <p class="h4 mb-4">Cálculo do frete</p>
                                    
                                    <div class="coupon">
                                        <label for="cep">CEP:</label>
                                        <input type="text" placeholder="00000-000" value="<?php echo htmlspecialchars( $cart["des_zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="cep" class="input-text form-control mb-2" name="zipcode">
                                        <input type="submit" formmethod="post" formaction="/cart/freight" value="Calcular" class="btn btn-primary">
                                    </div>

                                </div>

                                <br/><br/><br/>
                                <div class="cart_totals ">

                                    <p class="h4 mb-4">Resumo da compra</p>

                                    <table cellspacing="0" class="table table-striped">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount">R$ <?php echo formatPrice($cart["vl_subtotal"]); ?></span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Frete</th>
                                                <td>R$ <?php echo formatPrice($cart["vl_freight"]); ?><?php if( $cart["nr_days"] > 0 ){ ?> 
                                                    <small>prazo de <?php echo htmlspecialchars( $cart["nr_days"], ENT_COMPAT, 'UTF-8', FALSE ); ?> dia(s)</small><?php } ?>
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <strong>
                                                        <span class="amount">R$ <?php echo formatPrice($cart["vl_total"]); ?></span>
                                                    </strong> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="pull-right">
                                <input type="submit" value="Finalizar Compra" name="proceed" class="checkout-button button alt wc-forward btn btn-primary">
                            </div>

                        </form><br/><br/><br/>

                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>