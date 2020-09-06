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

 		Category::updateFile();

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

		Category::updateFile();

	}

	public static function updateFile()
	{

		$categories = Category::listAll();

		$html = [];

		foreach ($categories as $row) {
			array_push($html, '<li><a href="/categories/'.$row['id_category'].'">'.$row['des_category'].'</a></li>');
		}

		file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

	}


	public function getProducts($related = true)
	{

		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				SELECT * FROM tb_products WHERE id_product IN(
					SELECT a.id_product
					FROM tb_products a
					INNER JOIN tb_products_categories b ON a.id_product = b.id_product
					WHERE b.id_category = :id_category
				);
			", [
				'id_category'=>$this->getid_category()
			]);


		} else {

			return $sql->select("
				SELECT * FROM tb_products WHERE id_product NOT IN(
					SELECT a.id_product
					FROM tb_products a
					INNER JOIN tb_products_categories b ON a.id_product = b.id_product
					WHERE b.id_category = :id_category
				);
			", [
				'id_category'=>$this->getid_category()
			]);

		}

	}

	//Paginação dos produtos no site.
	public function getProductsPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage; //Número inicial de cada página.

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products a
			INNER JOIN tb_products_categories b ON a.id_product = b.id_product
			INNER JOIN tb_categories c ON c.id_category = b.id_category
			WHERE C.id_category = :id_category
			LIMIT $start, $itemsPerPage;
			", [
				':id_category'=>$this->getid_category()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage) //Arredonda o valor para cima, neste caso vai arredondar o número de páginas para cima.
		];

	}

	public function addProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_products_categories (id_category, id_product) VALUES (:id_category, :id_product)", [
			':id_category'=>$this->getid_category(),
			':id_product'=>$product->getid_product()
		]);

	}

	public function removeProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_products_categories WHERE id_category = :id_category AND id_product = :id_product", [
			':id_category'=>$this->getid_category(),
			':id_product'=>$product->getid_product()
		]);

	}

}

?>