<?php 
return array(
	"nav"=>array(
		"main"=>"Main", 
		"market"=>"Market", 
		"catalog"=>"Catalog", 
		"cart"=>"Cart",
		"contact"=>"Contact", 
		"latest_products"=>"Latest products", 
		"to_cart"=>"Add to cart",
		"register"=>"Registration"
	),
	"account"=>array(
		"cart"=>"Cart",
		"enter"=>"Authorization",
		"register"=>"Registration",
		"logout"=>"Logout",
		"orders"=>"Orders history",
		"orders_page"=>array(
			"order_no"=>"Order #",
			"products"=>"Products",
			"pay_status"=>"Payment status",
			"order_date"=>"Order time",
			"complete_date"=>"Estimate delivery time",
			"total"=>"Total",
			"stat_progr"=>"In progress",
			"stat_wait"=>"Waiting for payment...",
			"stat_complete"=>"Complete",
			"pay_true"=>"Payed",
			"pay_false"=>"Not payed",
			"no_order"=>"So far you have not ordered anything"
		)
	),
	"product"=>array(
		"availability"=>"Availability", 
		"condition"=>"Condition", 
		"brand"=>"Brand",
		"amount"=>"Amount",
		"description"=>"Product description",
		"code"=>"Product code",
		"in_stock"=>"In stock",
		"out_of_stock"=>"Out of stock",
		"cond_new"=>"New",
		"cond_used"=>"Used",
		"recomended"=>"Recomended products",
		"no_ctg"=>"No such category found"
	),
	"reg_and_sign"=>array(
		"login"=>"User authorization",
		"registered"=>"You've successfully registered",
		"start"=>"User registration",
		"signup"=>"Signup",
		"sign_in"=>"Sign in",
		"profile"=>"Profile",
		'profile_char'=>"'s",
		"enter"=>"Enter",
		"placeholders"=>array(
			"name"=>"Name Surname",
			"email"=>"email: example@mail.com",
			"password"=>"Your password",
			"address"=>"Tbilisi, ...",
			"old_password"=>"Old password",
			"new_password"=>"New password",
			"confirm"=>"Confirm password"
		),
		"errors"=>array(
			"name"=>"Name and surname must be separated by a miss symbol, must contain 2 or more letters and can not contain other characters",
			"email"=>"Incorrect format of email",
			"password"=>"The password must contain at least 1 uppercase Latin letter, 1 or more digit or a special character, and its length must not be less than 8 characters",
			"phone"=>"Phone must have format 555-01-02-03",
			"address"=>"Сorrect address format is: City, street # ... (Latin symbols)",
			"data_exist"=>"Email or phone is already used",
			"no_data"=>"No relevant data found",
			"no_match"=>"New and confirmation password don't match",
			"old_password"=>"Old password is not correct",
			"empty_inp"=>"All inputs are empty",
			"new_and_old"=>"Old password can't be new password"
		),
		"log_out"=>array(
			"sure"=>"Are you sure?",
			"autrz"=>"You won't be able to buy without authorization",
			"confirm"=>"Yes, logout",
			"decline"=>"Cancel"
		),
		"profile_data"=>array(
			"heading"=>"Profile data",
			"password"=>"Change password",
			"update"=>"update",
			"success_msg"=>"Information was successfully updated"
		)
	),
	"cart"=>array(
			"item"=>"Item",
			"price"=>"Price",
			"quantity"=>"Quantity",
			"subtotal"=>"Subtotal",
			"total"=>"Total amount",
			"empty"=>"Cart is empty",
			"add4chk"=>"You must add products for checkout",
			"continue"=>"Continue",
			"log4chk"=>"You must login for checkout",
			"success"=>"You have successfully checked out produсts from cart. Invoice is sent to your email"
	),
	"contact"=>array(
		"get_in_touch"=>"Get in touch",
		"contact_info"=>"Contact Info",
		"placeholders"=>array(
			"name"=>"Name, Surname",
			"subject"=>"Subject",
			"msg"=>"Your message here",
			"mail"=>"Your email"
		),
		"send"=>"Send",
		"mobile"=>"Mobile",
		"mail"=>"Email",
		"co_name"=>"E-Shopper Inc.",
		"errors"=>array(
			"subject"=>"Subject length must be more than 5 characters",
			"msg"=>"Message length must be more than 10 characters"
		),
		"msg_sent"=>"Message was successfully sent"
	),
	"invoices"=>array(
		"details"=>"Invoice details are in attached file"
	)
);
?>