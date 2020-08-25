<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;

class User extends Model{

	const SESSION ="User";

	public static function login($login, $password)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE des_login = :LOGIN", array(
				":LOGIN"=>$login
		));

		if (count($results) === 0) {
			throw new \Exception("Usuário ou senha inválida. oi");
			
		}

		$data = $results[0];

		if (password_verify($password, $data["des_password"]) === true) {

			$user = new User();

			//Traz o array inteiro
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {
			throw new \Exception("Usuário ou senha inválida. tchau");
		}

	}

	//Usuário da administração
	public function verifyLogin($inadmin = true)
	{

		if(
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id_user"] > 0
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin

		){

			header("Location: /admin/login");
			exit;

		}

	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

}
//$2y$12$hKaYkmysAUxuw4gYLdTL3eyB7eVzwt4.mK4gGCQUYMD0X/YNzINrG
?>