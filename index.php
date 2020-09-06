<?php 

session_start();
require_once("vendor/autoload.php");

//Name Spaces
use \Slim\Slim;
/*use \Flavia\Page;
use \Flavia\PageAdmin;
use \Flavia\Model\User;
use \Flavia\Model\Category;*/

$app = new \Slim\Slim();

$app->config('debug', true);

require_once("site.php"); //rotas do site.
require_once("functions.php"); //rotas das funções reaproveitadas.
require_once("admin.php"); //rotas da área administrativa.
require_once("admin-users.php"); //rotas para o gerenciamento de usuários na área administrativa.
require_once("admin-categories.php"); //rotas para o gerenciamento de categorias na área administrativa.
require_once("admin-products.php"); //rotas para o gerenciamento de produtos na área administrativa.

$app->run();

 ?>