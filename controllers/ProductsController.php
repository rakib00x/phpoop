<?php
class ProductsController{
	private $lang;
    private $langpack;
    private $title;
	private $products;
	function __construct($lang, $langpack){
		$this->lang = $lang;
		$this->langpack = $langpack;
		$this->title = new Title($lang);
		$this->products = new Products();
	}
	public function actionView($id){
		$title = $this->title->getTitle();
		$ctgs = Category::getCtgList();
		$product = $this->products->getProductById($id);
		session_start();
		if(isset($_SESSION['user'])) User::addToRecommended($_SESSION["user"]["id"], $id);
		require_once(ROOT."/views/products/view.php");
		return true;
	}
}
?>