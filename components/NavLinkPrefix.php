<?php function getLangLink($lang_rpl, $lang){
    $arr = explode("/", $_SERVER['REQUEST_URI']);
    if (count($arr)<3) return "/".$lang_rpl;
    else {
        $link = str_ireplace($lang, $lang_rpl, $_SERVER['REQUEST_URI']);
        return $link;
    }
}
?>