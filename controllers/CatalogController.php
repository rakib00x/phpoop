<?php
class CatalogController{
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
	public function actionIndex(){
		$title = $this->title->getTitle();
		$ctgs = Category::getCtgList();
		$latestProducts = $this->products->getProducts(10);
		require_once(ROOT."/views/catalog/index.php");
		return true;
	}
	public function actionCategory($ctgId, $page=1){
		$title = $this->title->getTitle();
		$ctgs = Category::getCtgList();
		$categoryProducts = $this->products->getProdListByCtg($ctgId, $page);
		$totalProd = $this->products->getTotalProdInCtg($ctgId);
		$pagination = new Pagination($totalProd, $page, $this->products->defaultAmount, "p", "/");
		require_once(ROOT."/views/catalog/category.php");
		return true;
	}
}
?>