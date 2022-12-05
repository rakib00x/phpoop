<?php
class SiteController{
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
		if(!isset($_SESSION)) session_start();
		if(isset($_SESSION['user']["id"])){
			$user_id = $_SESSION['user']["id"];
			$recommended = User::getRecommendedList($user_id);
		}
		require_once(ROOT."/views/site/index.php");
		return true;
	}
}
?>