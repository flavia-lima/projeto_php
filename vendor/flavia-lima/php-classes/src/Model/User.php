<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;
use \Flavia\Mailer;

class User extends Model{

	const SESSION ="User";
	const SECRET ="Flavia_GeekStore"; //Chave de criptografia.
	const SECRET_IV = "Flavia_GeekStore_Secret_IV";
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const SUCCESS = "UserSucesss";

	protected $fields = [
		"id_user", "id_person", "des_login", "des_password", "email", "phone", "cpf", "inadmin", "des_person"
	];

	//Pega o usuário da sessão.
	public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id_user'] > 0) {
			
			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

	public static function checkLogin($inadmin = true)
	{

		if (!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id_user"] > 0) {
			
			//O usuário não está logado.
			return false;

		} else { //Se ele estiver logado.

			//Se o usuário acessar uma rota administrativa, ele deve ser um admin.
			if ($inadmin === true && (bool)$_SESSION[User::SESSION]["inadmin"] === true) {
				
				return true; //Está logado e é um admin.

			} else if ($inadmin === false) { //Se for um usuário comum.

				return true;

			} else { 

				return false; //Senão, ele não está logado. Retorna falso.

			}

		}

	}

	public static function login($login, $password)
	{

		$sql = new Sql();

		// $results = $sql->select("SELECT * FROM tb_users WHERE des_login = :LOGIN", array(
		// 		":LOGIN"=>$login
		// ));

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.id_person = b.id_person WHERE a.des_login = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) === 0) {
			throw new \Exception("Usuário ou senha inválida. oi");
			
		}

		$data = $results[0];

		if (password_verify($password, $data["des_password"]) === true) {

			$user = new User();

			$data['des_person'] = utf8_encode($data['des_person']);

			//Traz o array inteiro
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {
			throw new \Exception("Usuário ou senha inválida. tchau");
		}

	}

	//Usuário da administração. Verifica o login do usuário da administração.
	public function verifyLogin($inadmin = true)
	{

		if(!User::checkLogin($inadmin)){

			if($inadmin) {
				header("Location: /admin/login");
			} else {
				header("Location: /login");
			}
			exit;

		}

	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(id_person) ORDER BY b.des_person");


	}

	public function get($id_user)
	{
 
		$sql = new Sql();
		 
		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(id_person) WHERE a.id_user = :id_user;", array(
		 ":id_user"=>$id_user
		));
		 
		$data = $results[0];

		$data['des_person'] = utf8_encode($data['des_person']);	
		 
		$this->setData($data);
 
 	}

	/* public static function getPasswordHash($password)
	{

			return password_hash($password, PASSWORD_DEFAULT, [
				'cost'=>12
			]);

		}*/

	public function save()
	{

	 	$sql = new Sql();

	 	$results = $sql->select("CALL sp_users_save(:des_person, :des_login, :des_password, :email, :phone, :cpf, :inadmin)", array(

	 		":des_person"=>utf8_decode($this->getdes_person()),
	 		":des_login"=>$this->getdes_login(),
	 		":des_password"=>User::getPasswordHash($this->getdes_password()),
	 		/*":des_password" => password_hash($this->getdes_password (), PASSWORD_DEFAULT, ['cont' => 12]),*/
	 		":email"=>$this->getemail(),
	 		":phone"=>$this->getphone(),
	 		":cpf"=>$this->getcpf(),
	 		":inadmin"=>$this->getinadmin()
	 	));

 		$this->setData($results[0]); //deve trazer somente o primeiro registro

	}

	// public function get($id_user)
	// {

	//  	$sql = new Sql();

	//  	$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(id_person) WHERE a.id_user = :id_user", array(
	//  			":id_user"=>$id_user
	//  	));

	//  	$this->setData($results[0]);

	// }

	public function update()
	{

		$sql = new Sql();

	 	$results = $sql->select("CALL sp_usersupdate_save(:id_user, :des_person, :des_login, :des_password, :email, :phone, :cpf, :inadmin)", array(
	 		":id_user"=>$this->getid_user(),
	 		":des_person"=>utf8_decode($this->getdes_person()),
	 		":des_login"=>$this->getdes_login(),
	 		":des_password"=>User::getPasswordHash($this->getdes_password()),
	 		":email"=>$this->getemail(),
	 		":phone"=>$this->getphone(),
	 		":cpf"=>$this->getcpf(),
	 		":inadmin"=>$this->getinadmin()
	 	));

 		$this->setData($results[0]);

	}

	// public function delete()
	// {

	// 	$sql = new Sql();

	// 	$sql->query("CALL sp_products_delete(:id_product)", [
 //        ':id_product'=>$this->getid_product()
 //    	]);

	// }

	public function delete()
	{

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:id_user)", array(
			":id_user"=>$this->getid_user()
		));

	}

	public static function getForgot($email, $inadmin = true)
	{

		$sql =new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_persons a
			INNER JOIN tb_users b USING(id_person)
			WHERE a.email = :email;
		", array(
			":email"=>$email
		));

		//Caso o usuário informe um e-mail que não existe.
		if(count($results) === 0)
		{

			throw new \Exception("Não foi possível recuperar a senha.");
			

		} else {

			$data = $results[0];

			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:id_user, :des_ip)", array(
				":id_user"=>$data["id_user"],
				":des_ip"=>$_SERVER["REMOTE_ADDR"] //Pega o ip do usuário.
			));

			if(count($results2) === 0 )
			{

				throw new \Exception("Não foi possível recuperar a senha.");

			} else {

				$dataRecovery = $results2[0];

				$code = openssl_encrypt($dataRecovery['id_recovery'], 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

				$code = base64_encode($code);

				if ($inadmin === true) {
					
					$link = "http://www.projetophp.com.br/admin/forgot/reset?code=$code"; //Recuperação de senha para admin.

				} else {

					$link = "http://www.projetophp.com.br/forgot/reset?code=$code"; //Recuperação de senha para usuário comum.

				}


				$mailer = new Mailer($data['email'], $data['des_person'], "Redefinir senha da Geek Store", "forgot", array(
					"name"=>$data['des_person'],
					"link"=>$link
				));

				$mailer->send();

				return $data;

			}

		}

	}

	public static function validForgotDecrypt($code)
	{

		$code = base64_decode($code);

		$id_recovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_users_passwords_recoveries a
			INNER JOIN tb_users b USING(id_user)
			INNER JOIN tb_persons c USING(id_person)
			WHERE
				a.id_recovery = :id_recovery
				AND
				a.dt_recovery IS NULL
				AND
				DATE_ADD(a.dt_register, INTERVAL 1 HOUR) >= NOW();
		", array(
			":id_recovery"=>$id_recovery
		));

		if(count($results) === 0)
		{

			throw new \Exception("Não foi possível recuperar a senha.");

		} else {

			return $results[0];

		}

	}

	public static function setForgotUsed($id_recovery)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_users_passwords_recoveries SET dt_recovery = NOW() WHERE id_recovery = :id_recovery", array(
			":id_recovery"=>$id_recovery
		));

	}

	public function setPassword($password)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_users SET des_password = :password WHERE id_user = :id_user", array(
			":password"=>$password,
			":id_user"=>$this->getid_user()
		));

	}

	public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;

	}

	public static function setErrorRegister($msg)
	{

		$_SESSION[User::ERROR_REGISTER] = $msg;

	}

	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{

		$_SESSION[User::ERROR_REGISTER] = NULL;

	}

	public static function checkLoginExist($login)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE des_login = :des_login", [
			':des_login'=>$login
		]);

		return (count($results) > 0);

	}

	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}


}
//$2y$12$hKaYkmysAUxuw4gYLdTL3eyB7eVzwt4.mK4gGCQUYMD0X/YNzINrG
?>