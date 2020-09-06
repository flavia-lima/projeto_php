<?php

use \Flavia\PageAdmin;
use \Flavia\Page;
use \Flavia\Model\User;
use \Flavia\Model\Category;
use \Flavia\Model\Product;

$app->get("/admin/categories", function() {

	User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("categories", [
		'categories'=>$categories
	]);

});

$app->get("/admin/categories/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("categories-create");

});

$app->post("/admin/categories/create", function() {

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

$app->get("/admin/categories/:id_category/delete", function($id_category) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$id_category);

	$category->delete();

	header("Location: /admin/categories");
	exit;

});

$app->get("/admin/categories/:id_category", function($id_category) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$id_category);

	$page = new PageAdmin();

	$page->setTpl("categories-update", [
		'category'=>$category->getValues()
	]);

});

$app->post("/admin/categories/:id_category", function($id_category) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$id_category);

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

//Rota para acessar categorias-produtos.
$app->get("/admin/categories/:id_category/products", function($id_category) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$id_category);

	$page = new PageAdmin();

	$page->setTpl("categories-products", [
		'category'=>$category->getValues(),
		'productsRelated'=>$category->getProducts(),
		'productsNotRelated'=>$category->getProducts(false)
	]);

});

//Rota para adicionar produtos na categoria atual.
$app->get("/admin/categories/:id_category/products/:id_product/add", function($id_category, $id_product) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$id_category);

	$product = new Product();

	$product->get((int)$id_product);

	$category->addProduct($product);

	header("Location: /admin/categories/".$id_category."/products");
	exit;

});

//Rota para remover produtos na categoria atual.
$app->get("/admin/categories/:id_category/products/:id_product/remove", function($id_category, $id_product) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$id_category);

	$product = new Product();

	$product->get((int)$id_product);

	$category->removeProduct($product);

	header("Location: /admin/categories/".$id_category."/products");
	exit;

});

?>