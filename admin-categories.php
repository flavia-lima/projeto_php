<?php

use \Flavia\PageAdmin;
use \Flavia\Page;
use \Flavia\Model\User;
use \Flavia\Model\Category;

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

$app->get("/categories/:id_category", function($id_category) {

	$category = new Category();

	$category->get((int)$id_category);

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>[]
	]);

});

?>