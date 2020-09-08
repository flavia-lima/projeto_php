<?php

use \Flavia\Page;
use \Flavia\Model\Product;
use \Flavia\Model\Category;
use \Flavia\Model\Cart;
use \Flavia\Model\Address;
use \Flavia\Model\User;

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

//O usuário só pode acessar a rota do checkout se estiver logado ou cadastrado.
$app->get("/checkout", function() {

	User::verifyLogin(false); //False porque não é um usuário admin.

	$cart = Cart::getFromSession();

	$address = new Address();

	$page = new Page();

	$page->setTpl("checkout", [
		'cart'=>$cart->getValues(),
		'address'=>$address->getValues()
	]);

});

//Login no site.
$app->get("/login", function() {

	$page = new Page();

	$page->setTpl("login", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'', 'cpf'=>'']
	]);

});

$app->post("/login", function() {

	try{

		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());

	}

	header("Location: /checkout");
	exit;

});

$app->get("/logout", function() {

	User::logout();

	header("Location: /login");
	exit;

});

//Cadastro de usuário comum a partir do site.
$app->post("/register", function() {

	$_SESSION['registerValues'] = $_POST; //Para não perder os dados que já foram preenchidos.

	if (!isset($_POST['name']) || $_POST['name'] == '') {
		
		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /login");
		exit;

	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {
		
		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /login");
		exit;

	}

	if (!isset($_POST['password']) || $_POST['password'] == '') {
		
		User::setErrorRegister("Preencha a senha.");
		header("Location: /login");
		exit;

	}

	if (User::checkLoginExist($_POST['email']) === true) {
		
		User::setErrorRegister("Endereço de e-mail já cadastrado por outro usuário.");
		header("Location: /login");
		exit;

	}

	$user = new User();

	$user->setData([
		'inadmin'=>0,
		'des_login'=>$_POST['email'],
		'des_person'=>$_POST['name'],
		'email'=>$_POST['email'],
		'phone'=>(int)$_POST['phone'],
		'des_password'=>$_POST['password'],
		'cpf'=>(int)$_POST['email']
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	header("Location: /checkout");
	exit;

});

//Esqueceu a senha.
$app->get("/forgot", function() {

	$page = new Page();

	$page->setTpl("forgot", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
	]);

});

$app->post("/forgot", function() {

	if (!isset($_POST['email']) || $_POST['email'] == '') {
		
		User::setErrorRegister("Preencha um e-mail válido.");
		header("Location: /forgot");
		exit;

	}

	$user = User::getForgot($_POST["email"], false);

	header("Location: /forgot/sent");
	exit;

});

$app->get("/forgot/sent", function() {

	$page = new Page();

	$page->setTpl("forgot-sent");

});

$app->get("/forgot/reset", function() {

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new Page();

	$page->setTpl("forgot-reset", array(
		"name"=>$user["des_person"],
		"code"=>$_GET["code"]
	));

});

$app->post("/forgot/reset", function() {

	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["id_recovery"]);

	$user = new User();

	$user->get((int)$forgot["id_user"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	$user->setPassword($password);

	$page = new Page();

	$page->setTpl("forgot-reset-success");

});

//Minha conta.
$app->get("/profile", function() {

	User::verifyLogin(false); //False significa que é um usuário comum.

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile", [
		'user'=>$user->getValues(),
		'profileMsg'=>$user->getSuccess(),
		'profileError'=>$user->getError()
	]);

});

$app->post("/profile", function() {

	User::verifyLogin(false); //False significa que é um usuário comum.

	if (!isset($_POST['des_person']) || $_POST['des_person'] === '') {
		User::setError("Preencha seu nome.");
		header("Location: /profile");
		exit;
	}

	if (!isset($_POST['email']) || $_POST['email'] === '') {
		User::setError("Preencha seu e-mail.");
		header("Location: /profile");
		exit;
	}

	$user = User::getFromSession();

	//Se o usuário alterou o e-mail.
	if ($_POST['email'] !== $user->getemail()) {
		
		if (User::checkLoginExist($_POST['email']) === true) {
			
			User::setError("Este endereço de e-mail já está cadastrado.");
			header("Location: /profile");
			exit;

		}

	}

	$_POST['inadmin'] = $user->getinadmin(); //Pega o nível cadastrado no banco.
	$_POST['des_password'] = $user->getdes_password(); //Pega a senha cadastrada no banco.
	$_POST['des_login'] = $_POST['email']; //O login é o próprio e-mail

	$user->setData($_POST);

	$user->save();

	User::setSuccess("Informações alteradas com sucesso!");

	header("Location: /profile");
	exit;

});

?>