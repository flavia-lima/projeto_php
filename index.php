<?php 

session_start();
require_once("vendor/autoload.php");

//Name Spaces
use \Slim\Slim;
use \Flavia\Page;
use \Flavia\PageAdmin;
use \Flavia\Model\User;

$app = new \Slim\Slim();

$app->config('debug', true);

//Rota da Página raiz.
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

//Rota para a página principal do Admin.
$app->get('/admin', function() {

	User::verifyLogin();
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);
 	header("Location: /admin");
 	exit;
});

$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;
	
}); 

$app->run();

 ?>