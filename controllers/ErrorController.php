<?php
class ErrorController{
	private $lang;
    private $langpack;
    private $title;
	function __construct($lang, $langpack){
		$this->lang = $lang;
		$this->langpack = $langpack;
		$this->title = new Title($lang);
	}
	public function actionIndex(){
		$title = $this->title->getTitle();
		require_once(ROOT."/views/404/index.php");
		return true;
	}
}
?>