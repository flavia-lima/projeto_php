<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;

class User extends Model{

	const SESSION ="User";

	protected $fields = [
		"id_user", "id_person", "des_login", "des_password", "email", "phone", "cpf", "inadmin", "des_person"
	];

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

	 		":des_person"=>$this->getdes_person(),
	 		":des_login"=>$this->getdes_login(),
	 		":des_password"=>$this->getdes_password(),
	 		/*":des_password" => password_hash($this->getdes_password (), PASSWORD_DEFAULT, ['cont' => 12]),*/
	 		":email"=>$this->getemail(),
	 		":phone"=>$this->getphone(),
	 		":cpf"=>$this->getcpf(),
	 		":inadmin"=>$this->getinadmin()
	 	));

 		$this->setData($results[0]); //deve trazer somente o primeiro registro

	}

	/*public function get($id_user)
	{

	 	$sql = new Sql();

	 	$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(id_person) WHERE a.id_user = :id_user", array(
	 			":id_user"=>$id_user
	 	));

	 	$this->setData($results[0]);

	}*/

	public function update()
	{

		$sql = new Sql();

	 	$results = $sql->select("CALL sp_usersupdate_save(:id_user, :des_person, :des_login, :des_password, :email, :phone, :cpf, :inadmin)", array(
	 		":id_user"=>$this->getid_user(),
	 		":des_person"=>$this->getdes_person(),
	 		":des_login"=>$this->getdes_login(),
	 		":des_password"=>$this->getdes_password(),
	 		":email"=>$this->getemail(),
	 		":phone"=>$this->getphone(),
	 		":cpf"=>$this->getcpf(),
	 		":inadmin"=>$this->getinadmin()
	 	));

 		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:id_user)", array(
			":id_user"=>$this->getid_user()
		));

	}

}
//$2y$12$hKaYkmysAUxuw4gYLdTL3eyB7eVzwt4.mK4gGCQUYMD0X/YNzINrG
?>