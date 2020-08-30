<?php

use \Flavia\PageAdmin;
use \Flavia\Model\User;
use \Flavia\Model\Product;

$app->get("/admin/products", function() {

	User::verifyLogin();

	$products = Product::listAll();

	$page = new PageAdmin();

	$page->setTpl("products", [
		"products"=>$products
	]);

});

$app->get("/admin/products/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("products-create");

});

$app->post("/admin/products/create", function() {

	User::verifyLogin();

	$product = new Product();

	$product->setData($_POST);

	$product->save();

	header("Location: /admin/products");
	exit;

});

$app->get("/admin/products/:id_product", function($id_product) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$id_product);

	$page = new PageAdmin();

	$page->setTpl("products-update", [
		'product'=>$product->getValues()
	]);

});

$app->post("/admin/products/:id_product", function($id_product) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$id_product);

	$product->setData($_POST);

	$product->save();

	$product->setPhoto($_FILES["file"]); //Faz o upload do arquivo.

	header('Location: /admin/products');
	exit;

});

$app->get("/admin/products/:id_product/delete", function($id_product) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$id_product);

	$product->delete();

	header('Location: /admin/products');
	exit;

});

?>