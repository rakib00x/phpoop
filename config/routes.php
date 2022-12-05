<?php 
return array (
	"([en|ge]{2})/cart/checkout"=>"$1/cart/checkout",
	"([en|ge]{2})/cart"=>"$1/cart/view",
	"([en|ge]{2})/products/([0-9]+)"=>"$1/products/view/$2",
	"([en|ge]{2})/catalog"=>"$1/catalog/index",
	"([en|ge]{2})/category/([0-9]+)/[a-z]+[-|/]([0-9]+)"=>"$1/catalog/category/$2/$3",
	"([en|ge]{2})/category/([0-9]+)"=>"$1/catalog/category/$2",
	"([en|ge]{2})/user/orders"=>"$1/user/orders",
	"([en|ge]{2})/user/register"=>"$1/user/register",
	"([en|ge]{2})/contact"=>"$1/contact/index",
	"([en|ge]{2})/user/profile"=>"$1/user/profile",
	"([en|ge]{2})/user/login"=>"$1/user/login",
	"([en|ge]{2})"=>"$1/site/index",
	'error/index'=>"error/index",
	"user/logout"=>"user/logout",
	"cart/AddProduct"=>"cart/AddProduct",
	"cart/GetTotalQuantity"=>"cart/GetTotalQuantity",
	"cart/GetProducts"=>"cart/GetProducts",
	"cart/UpdateProduct"=>"cart/UpdateProduct",
	"^(?!en$|ge$).+"=>"error/index",
	""=>"site/index",

) 
?>