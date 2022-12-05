<?php 
class Products{
	private $pdo;
	public $defaultAmount = 4;
	function __construct(){
		$this->pdo = DB::getConnection();
	}
	public function getProducts($count) {
		$total = $count?$count:$this->defaultAmount;
		$productsList = $this->pdo->query("SELECT * FROM `products` ORDER BY id DESC LIMIT {$total}")->fetchAll(PDO::FETCH_ASSOC);
		return $productsList;
	}
	public function getProdListByCtg($ctgId=false, $page=1){
		if ($ctgId) {
			$page = intval($page);
			$offset = ($page - 1)*$this->defaultAmount;
			$prodListByCtg = $this->pdo->prepare("SELECT prod.id, prod.name, prod.code, prod.price, prod.availability, prod.brand_id, prod.ge_descr, prod.en_descr, prod.category_id, prod.is_new,prod.status, prod.img, br.name AS brand, ctg.en_name as ctg_en_name, ctg.ge_name AS ctg_ge_name FROM `products` prod INNER JOIN `category` ctg ON prod.category_id = ctg.id INNER JOIN
				`brands` br ON prod.brand_id = br.id
				WHERE prod.status = 1 AND prod.category_id=:ctgId ORDER BY prod.id DESC LIMIT {$this->defaultAmount} OFFSET {$offset}");
			$prodListByCtg->bindParam(':ctgId', $ctgId, PDO::PARAM_INT);
			$prodListByCtg->execute();
			$prodListByCtg = $prodListByCtg->fetchAll();
			return $prodListByCtg;
		}
	}
	public function getProductById($id){
		$product = $this->pdo->prepare("SELECT prod.id, prod.name, prod.is_new, prod.availability, prod.code, prod.price, prod.en_descr, prod.ge_descr, prod.img, br.name AS brand FROM `products` prod INNER JOIN `brands` br ON prod.brand_id = br.id WHERE prod.status = 1 AND prod.id=:id");
		$product->bindParam(':id', $id, PDO::PARAM_INT);
		$product->execute();
		$product = $product->fetch(PDO::FETCH_ASSOC);
		return $product;
	}
	public function getTotalProdInCtg($ctgId){
		$total = $this->pdo->prepare("SELECT count(*) AS count FROM `products` WHERE status = 1 AND category_id=:ctgId");
		$total->bindParam(":ctgId", $ctgId, PDO::PARAM_INT);
		$total->execute();
		$total = $total->fetch(PDO::FETCH_ASSOC);
		return $total["count"];
	}
}
?>