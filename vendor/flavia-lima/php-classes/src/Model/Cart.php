<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;
use \Flavia\Mailer;
use \Flavia\Model\User;

class Cart extends Model{

	const SESSION = "Cart";

	//Pega o carrinho que está na sessão.
	public static function getFromSession()
	{

		$cart = new Cart();

		if (isset($_SESSION[Cart::SESSION]) && (int)$_SESSION[Cart::SESSION]['id_cart'] > 0) {
			
			$cart->get((int)$_SESSION[Cart::SESSION]['id_cart']);

		} else {

			$cart->getFromSessionID();

			if (!(int)$cart->getid_cart() > 0) {
				
				$data = [
					'des_session_id'=>session_id()
				];

				//Se usuário comum está logado.
				if (User::checkLogin(false)) {
					
					$user = User::getFromSession();

					$data['id_user'] = $user->getid_user();

				}

				$cart->setData($data);

				$cart->save();

				$cart->setToSession();

			}

		}

		return $cart;

	}

	//Coloca o carrinho na sessão.
	public function setToSession()
	{

		$_SESSION[Cart::SESSION] = $this->getValues();

	}

	public function getFromSessionID()
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_carts WHERE des_session_id = :des_session_id", [
			':des_session_id'=>session_id()
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}

	}

	public function get(int $id_cart)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_carts WHERE id_cart = :id_cart", [
			':id_cart'=>$id_cart
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_carts_save(:id_cart, :des_session_id, :id_user, :des_zipcode, :vl_freight, :nr_days)", [
			':id_cart'=>$this->getid_cart(),
			':des_session_id'=>$this->getdes_session_id(),
			':id_user'=>$this->getid_user(),
			':des_zipcode'=>$this->getdes_zipcode(),
			':vl_freight'=>$this->getvl_freight(),
			':nr_days'=>$this->getnr_days()
		]);

		$this->setData($results[0]);

	}

}

?>