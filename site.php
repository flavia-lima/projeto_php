<?php

use \Flavia\Page;
use \Flavia\Model\Product;
use \Flavia\Model\Category;
use \Flavia\Model\Cart;

//Rota da Página raiz.
$app->get('/', function() {

	$products = Product::listAll();
    
	$page = new Page();

	$page->setTpl("index", [
		'products'=>Product::checkList($products)
	]);

});

$app->get("/categories/:id_category", function($id_category) {

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$id_category);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/categories/'.$category->getid_category().'?page='.$i,
			'page'=>$i //num da pagina
		]);
	}

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>$pagination["data"],
		'pages'=>$pages
	]);

});

//Detalhes do produto.
$app->get("/products/:des_url", function($des_url) {

	$product = new Product();

	$product->getFromURL($des_url);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);

});

//Carrinho.
$app->get("/cart", function() {

	$cart = Cart::getFromSession();

	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts(),
		'error'=>Cart::getMsgError()
	]);

});

//Adiciona o produto ao carrinho.
$app->get("/cart/:id_product/add", function($id_product){

	$product = new Product();

	$product->get((int)$id_product);

	$cart = Cart::getFromSession();

	//$cart->addProduct($product);

	$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1;

	for ($i = 0; $i < $qtd; $i++) {
		
		$cart->addProduct($product);

	}

	header("Location: /cart");
	exit;

});

//Remove o produto do carrinho.
$app->get("/cart/:id_product/minus", function($id_product) {

	$product = new Product();

	$product->get((int)$id_product);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product);

	header("Location: /cart");
	exit;

});

//Remove do carrinho todos os itens do mesmo produto.
$app->get("/cart/:id_product/remove", function($id_product) {

	$product = new Product();

	$product->get((int)$id_product);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product, true); //Passando o true para remover todos.

	header("Location: /cart");
	exit;

});

//Rota para o calculo do frete.
$app->post("/cart/freight", function() {

	$cart = Cart::getFromSession(); //Pega o carrinho na sessão.

	$cart->setFreight($_POST['zipcode']);

	header("Location: /cart");
	exit;

});

?>