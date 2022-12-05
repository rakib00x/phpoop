<?php
class ContactController{
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
		$contact = Contact::getContactInfo();
		$result=false;
		$errors = array();
		if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $msg = $_POST["msg"];
            if (strlen($subject)<5)
            	{$errors[] = $this->langpack['contact']['errors']['subject'];}
            if (strlen($msg)<10)
            	{$errors[] = $this->langpack['contact']['errors']['msg'];}
            if (!Validator::checkName($name)) 
                {$errors[] = $this->langpack['reg_and_sign']['errors']['name'];}
            if (!Validator::checkEmail($email)) 
                {$errors[] = $this->langpack['reg_and_sign']['errors']['email'];}
            if (empty($errors)){
            	/*langpack is sent to PHPMailer constructor to get necessary words for message body*/
                $result = Contact::sendMessage($this->langpack, $name, $email, $subject, $msg);
            }
        }
		require_once(ROOT."/views/contact/index.php");
		return true;
	}
}
?>