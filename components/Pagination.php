<?php
class Pagination{
    private $prefix;
    private $current_page;
    private $total;
    private $limit;
    public function __construct($total, $currentPage, $limit, $prefix, $delimiter="/"){
        $this->total = $total;
        $this->limit = $limit;
        $this->prefix = $prefix;
        $this->delimiter = $delimiter;
        $this->amount = $this->getTotalAmount();
        $this->currentPage = $currentPage;
    }
    public function generate(){
        $html = "<ul class='pagination'>";
        $currentURI = preg_replace("~/{$this->prefix}{$this->delimiter}[0-9]+/~", "", $_SERVER['REQUEST_URI']);
        if ($this->amount>1) {
            if (is_numeric($this->currentPage)&&($this->currentPage<=$this->amount)) {
                if ($this->currentPage>1){
                    $prevPage = $this->currentPage - 1;
                    $html.="<li><a href='{$currentURI}/{$this->prefix}{$this->delimiter}{$prevPage}/'><i class='fa fa-arrow-circle-left paging-direction'></i></a></li>";
                }
                for ($i=1; $i <=$this->amount; $i++) {
                    if ($i==$this->currentPage) {
                        $html.="<li class='active'><a href='{$currentURI}/{$this->prefix}{$this->delimiter}{$i}/'>{$i}</a></li>";
                    }
                    else $html.="<li><a href='{$currentURI}/{$this->prefix}{$this->delimiter}{$i}/'>{$i}</a></li>";
                }
                if ($this->currentPage<$this->amount) {
                    $nextPage = $this->currentPage + 1;
                    $html.="<li><a href='{$currentURI}/{$this->prefix}{$this->delimiter}{$nextPage}/'><i class='fa fa-arrow-circle-right'></i></a>";
                }
                $html.="</ul>";
                return $html;
            }
            else return "<h3 class='invalid-page'>Invalid Page!</h3>";
        }
    }
    private function getTotalAmount(){
        return ceil($this->total / $this->limit);
    }
}