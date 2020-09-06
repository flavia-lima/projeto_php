<?php

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;
use \Flavia\Mailer;

class Product extends Model{

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_products ORDER BY des_product");

	}

	//Verifica a listagem dos produtos.
	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	public function save()
	{

		$sql = new Sql();

	 	$results = $sql->select("CALL sp_products_save(:id_product, :des_product, :price, :weight, :des_url)", array(

	 		":id_product"=>$this->getid_product(),
	 		":des_product"=>$this->getdes_product(),
	 		":price"=>$this->getprice(),
	 		":weight"=>$this->getweight(),
	 		":des_url"=>$this->getdes_url()
	 	));

 		$this->setData($results[0]);

	}

	//O nome do arquido da foto será o id do produto.
	public function get($id_product)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE id_product = :id_product", [
			':id_product'=>$id_product
		]);

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_products WHERE id_product = :id_product;", [
			":id_product"=>$this->getid_product()
		]);

	}

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"resources" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"products" . DIRECTORY_SEPARATOR . 
			$this->getid_product() . ".jpg"
			)) {

			$url = "/resources/site/img/products/" . $this->getid_product() . ".jpg";

		} else {

			$url = "/resources/site/img/product.jpg";

		}

		return $this->setdes_photo($url);

	}

	public function getValues()
	{

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

	}

	public function setPhoto($file)
	{
		//Para converter a extensão da imagem escolhida, caso seja diferente do formato jpg.
		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
				$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case "gif":
				$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case "png":
				$image = imagecreatefrompng($file["tmp_name"]);
			break;

		}

		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"resources" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"products" . DIRECTORY_SEPARATOR . 
			$this->getid_product() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

}

?>