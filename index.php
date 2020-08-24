<?php 

require_once("vendor/autoload.php");

//Name Spaces
use \Slim\Slim;
use \Flavia\Page;
use \Flavia\PageAdmin;

$app = new \Slim\Slim();

$app->config('debug', true);

//Rota da Página raiz.
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

//Rota para a página principal do Admin.
$app->get('/admin', function() {
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->run();

 ?>