<?php 
class Title{
	private $lang;
	private $titles;
	private $pagePartials;
	private $pageName;
	function __construct($lang){
		$this->lang = $lang;
		$this->titles = include(ROOT.'/config/langpacks/'.$this->lang.'_titles.php');
		$this->pagePartials = explode("/", $_SERVER['REQUEST_URI']);
		$this->pageName = $this->getPageName();
	}
	private function getPageName(){
		if (count($this->pagePartials)===2){
			if (!empty($this->pagePartials[1])&&!in_array($this->pagePartials[1], LANGS)) {
				return "404";
			}
			else return "index";
		}
		else{
			if (count($this->pagePartials)>2) {
				if (in_array($this->pagePartials[1], LANGS)) {
					if ($this->pagePartials[2]==="user") return $this->pagePartials[3];
					else return $this->pagePartials[2];
				}
			}
			return "404";
		}
	}
	public function getTitle(){
		if (array_key_exists($this->pageName, $this->titles)) return $this->titles[$this->pageName];
		else if ($this->pageName==="category") {
			$pdo = DB::getConnection();
			$ctg = $pdo->prepare("SELECT en_name, ge_name FROM `category` WHERE id=:id");
			$ctg->bindParam(":id", $this->pagePartials[3], PDO::PARAM_INT);
			$ctg->execute();
			$ctg = $ctg->fetch(PDO::FETCH_ASSOC);
			return $ctg[$this->lang."_name"];
		}
		else if ($this->pageName==="products") {
			$pdo = DB::getConnection();
			$prod = $pdo->prepare("SELECT name FROM `products` WHERE id=:id");
			$prod->bindParam(":id", $this->pagePartials[3], PDO::PARAM_INT);
			$prod->execute();
			$prod = $prod->fetch(PDO::FETCH_ASSOC);
			return $prod["name"];
		}
		else return $this->titles["404"];
	}
}
?>