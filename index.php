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

//Rota para listar usuários
$app->get("/admin/users", function() {

	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(

		"users"=>$users

	));

});

$app->get("/admin/users/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

$app->get("/admin/users/:id_user/delete", function($id_user) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id_user);

	$user->delete();

	header("Location: /admin/users");
 	exit;

});

$app->get('/admin/users/:id_user', function($id_user){
 
   User::verifyLogin();
 
   $user = new User();
 
   $user->get((int)$id_user);
 
   $page = new PageAdmin();
 
   $page ->setTpl("users-update", array(
        "user"=>$user->getValues()
    ));
 
});

/*$app->post("/admin/users/create", function() {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");

	exit;

}); ------ ANTIGA*/

$app->post("/admin/users/create", function () {

 	User::verifyLogin();

	$user = new User();

 	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

 	$_POST['des_password'] = password_hash($_POST["des_password"], PASSWORD_DEFAULT, [

 		"cost"=>12

 	]);

 	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
 	exit;

});

$app->post("/admin/users/:id_user", function($id_user) {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	$user->get((int)$id_user);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");
 	exit;

});

$app->run();

 ?>