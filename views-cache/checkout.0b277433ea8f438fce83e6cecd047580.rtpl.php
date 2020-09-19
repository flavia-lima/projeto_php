<?php if(!class_exists('Rain\Tpl')){exit;}?><div style="margin-top: 100px;"></div>


<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Pagamento</h2>
				</div>
			</div>
		</div>
	</div>
</div><br/><br/><br/>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-content-right">
					<form action="/checkout" class="checkout" method="post" name="checkout">
						<div id="customer_details" class="col2-set">
							<div class="row">
								<div class="col-md-12">

									<?php if( $error != '' ){ ?>
									<div class="alert alert-danger">
										<?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
									</div>
									<?php } ?>

									<div class="woocommerce-billing-fields">
										<p class="h4 mb-4">Endereço de entrega</p>
										<p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_cep_1">Cep <abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $cart["des_zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="00000-000" id="billing_cep_1" name="zipcode" class="input-text form-control">
											<input type="submit" value="Atualizar CEP" id="place_order" class="button alt" formaction="/checkout" formmethod="get">
										</p>
										<div class="row">
											<div class="col-sm-9">
												<p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
													<label class="" for="billing_address_1">Endereço <abbr title="required" class="required">*</abbr>
													</label>
													<input type="text" value="<?php echo htmlspecialchars( $address["des_address"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Logradouro" id="billing_address_1" name="des_address" class="input-text form-control mb-4">
												</p>
											</div>
										<div class="col-sm-3">
											<p id="billing_number_1_field" class="form-row form-row-wide number-field validate-required">
											    <label class="" for="billing_number_1">Número <abbr title="required" class="required">*</abbr>
											    </label>
											    <input type="text" value="<?php echo htmlspecialchars( $address["des_number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Número" id="billing_address_1" name="des_number" class="input-text form-control mb-4">
											</p>
										</div>
										</div>
										<p id="billing_complement_2_field" class="form-row form-row-wide address-field">
											<label class="" for="billing_complement_1">Complemento <abbr title="complemento"></abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["des_complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Complemento (opcional)" id="billing_address_2" name="des_complement" class="input-text form-control mb-4">
                                        </p>
                                        <p id="billing_district_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_district">Bairro <abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["des_district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Cidade" id="billing_district" name="des_district" class="input-text form-control mb-4">
										</p>
										<p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_city">Cidade <abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["des_city"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Cidade" id="billing_city" name="des_city" class="input-text form-control mb-4">
										</p>
										<p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
											<label class="" for="billing_state">Estado</label>
											<input type="text" id="billing_state" name="des_state" placeholder="Estado" value="<?php echo htmlspecialchars( $address["des_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text form-control mb-4">
										</p>
										<p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
											<label class="" for="billing_state">País</label>
											<input type="text" id="billing_state" name="des_country" placeholder="País" value="<?php echo htmlspecialchars( $address["des_country"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text form-control mb-4">
										</p>
										<div class="clear"></div>
										<p class="h4 mb-4">Detalhes do pedido</p>
										<div id="order_review" style="position: relative;">
											<table class="shop_table table table-striped">
												<thead class="black white-text">
													<tr>
														<th class="product-name text-center">Produto</th>
														<th class="product-total text-center">Total</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
													<tr class="cart_item">
														<td class="product-name">
															<?php echo htmlspecialchars( $value1["des_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <strong class="product-quantity">× <?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
														</td>
														<td class="product-total">
															<span class="amount">R$<?php echo formatPrice($value1["vltotal"]); ?></span>
														</td>
                                                    </tr>
                                                    <?php } ?>
												</tbody>
												<tfoot>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td><span class="amount">R$<?php echo formatPrice($cart["vl_subtotal"]); ?></span>
														</td>
													</tr>
													<tr class="shipping">
														<th>Frete</th>
														<td>
															R$<?php echo formatPrice($cart["vl_freight"]); ?>
															<input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
														</td>
													</tr>
													<tr class="order-total">
														<th>Total do Pedido</th>
														<td><strong><span class="amount">R$<?php echo formatPrice($cart["vl_total"]); ?></span></strong> </td>
													</tr>
												</tfoot>
											</table>
											<div id="payment">
												<div class="form-row place-order">
													<input type="submit" data-value="Place order" value="Continuar" id="place_order" name="woocommerce_checkout_place_order" class="btn btn-primary">
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <br/><br/><br/>