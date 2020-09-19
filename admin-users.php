<?php

use \Flavia\PageAdmin;
use \Flavia\Model\User;

//Rota para listar usuários.
$app->get("/admin/users", function() {

	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(

		"users"=>$users

	));

});

//Rota para a criação de um novo usuário na área administrativa.
$app->get("/admin/users/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

//Rota para a remoção de um usuário.
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

 	// $_POST['des_password'] = password_hash($_POST["des_password"], PASSWORD_DEFAULT, [

 	// 	"cost"=>12

 	// ]);

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

?>