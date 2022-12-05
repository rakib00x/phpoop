<?php 
class Validator{
	public static function checkName($name){
        $pattern = "/^([a-zA-Z]{2,})\s([a-zA-Z]{2,})$/";
        if(preg_match($pattern, $name)) return true;
        return false;
    }
    public static function checkPhone($phone){
        $pattern = "/^(5\d{2})-(\d{2})-(\d{2})-(\d{2})$/";
        if(preg_match($pattern, $phone)) return true;
        return false;
    }
    public static function checkAddress($address){
        $pattern = "/^[a-zA-z]{3,}(\s)?,(\s)?[a-zA-z]{3,}\s#(\d){1,}(\s)?(\w)?$/";
        if(preg_match($pattern, $address)) return true;
        return false;
    }
    public static function checkPassword($password){
        $pattern = "/^(?=.*\d)(?=.*[A-Z]).{8,}$/";
        if(preg_match($pattern, $password)) return true;
        return false;
    }
    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
}
?>