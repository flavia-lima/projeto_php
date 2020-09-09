<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;

class Address extends Model{

	const SESSION_ERROR = "AddressError";

	public static function getCEP($nrcep)
	{

		$nrcep = str_replace("-", "", $nrcep);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://viacep.com.br/ws/$nrcep/json/");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);

		$data = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $data;

	}

	public function loadFromCEP($nrcep)
	{

		$data = Address::getCEP($nrcep);

		if (isset($data['logradouro']) && $data['logradouro']) {
			
			$this->setdes_address($data['logradouro']);
			// $this->setdes_number($data['numero']);
			$this->setdes_complement($data['complemento']);
			$this->setdes_city($data['localidade']);
			$this->setdes_state($data['uf']);
			$this->setdes_country('Brasil');
			$this->setdes_zipcode($nrcep);
			$this->setdes_district($data['bairro']);

		}

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_addresses_save(:id_address, :id_person, :des_address, :des_number, :des_complement, :des_city, :des_state, :des_country, :des_zipcode, :des_district)", [
			':id_address'=>$this->getid_address(),
			':id_person'=>$this->getid_person(),
			':des_address'=>$this->getdes_address(),
			':des_number'=>$this->getdes_number(),
			':des_complement'=>$this->getdes_complement(),
			':des_city'=>$this->getdes_city(),
			':des_state'=>$this->getdes_state(),
			':des_country'=>$this->getdes_country(),
			':des_zipcode'=>$this->getdes_zipcode(),
			':des_district'=>$this->getdes_district()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public static function setMsgError($msg)
	{

		$_SESSION[Address::SESSION_ERROR] = $msg;

	}

	public static function getMsgError()
	{

		$msg = (isset($_SESSION[Address::SESSION_ERROR])) ? $_SESSION[Address::SESSION_ERROR] : "";

		Address::clearMsgError();

		return $msg;

	}

	public static function clearMsgError()
	{

		$_SESSION[Address::SESSION_ERROR] = NULL;

	}
	
}

?>