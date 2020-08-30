<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;
use \Flavia\Mailer;

class Category extends Model{

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY des_category");

	}

	public function save()
	{

		$sql = new Sql();

	 	$results = $sql->select("CALL sp_categories_save(:id_category, :des_category)", array(

	 		":id_category"=>$this->getid_category(),
	 		":des_category"=>$this->getdes_category()
	 	));

 		$this->setData($results[0]);

	}

	public function get($id_category)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE id_category = :id_category", [
			':id_category'=>$id_category
		]);

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_categories WHERE id_category = :id_category", [
			':id_category'=>$this->getid_category()
		]);

	}

	

}
//$2y$12$hKaYkmysAUxuw4gYLdTL3eyB7eVzwt4.mK4gGCQUYMD0X/YNzINrG
?>