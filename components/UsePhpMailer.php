<?php
//PHPMailer namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//composer autoloader
require ROOT."/vendor/autoload.php";
class UsePhpMailer{
    public function __construct($langpack){
        $mailSettings = include(ROOT."/config/mail_settings.php");
        $this->langpack = $langpack;
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $mailSettings["Host"];
        $this->mailer->SMTPAuth = $mailSettings["SMTPAuth"];
        $this->mailer->Username = $mailSettings["Username"];
        $this->mailer->CharSet = "UTF-8"; 
        $this->admin = $mailSettings["AdminMail"];
        $this->from = $mailSettings["MailFrom"];                  
        $this->mailer->Password = $mailSettings["Password"]; 
        $this->mailer->SMTPSecure =  $mailSettings["SMTPSecure"];
        $this->mailer->Port = $mailSettings["Port"];    
    }
    public function sendContactForm($name, $email, $subject, $msg){
        try {
            $this->mailer->isHTML(true);
            $this->mailer->setFrom($this->mailer->Username, $this->from);
            $this->mailer->addAddress($this->admin);
            $this->mailer->Subject = $subject; 
            $this->mailer->Body = 
            "<p><b>{$this->langpack['contact']['placeholders']['name']}:</b>&nbsp;{$name}</p>
            <p><b>{$this->langpack['contact']['mail']}:</b>&nbsp;{$email}</p>
            <hr>
            <pre>{$msg}</pre>";
            return $this->mailer->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}";
            die();
        }
    }
    public function sendInvoice($lang, $productsList, $invoice_number, $name, $email){
        $invoice_directory = ROOT;
        $invoice_file = "inv_".time().".pdf";
        $full_path = "{$invoice_directory}/${invoice_file}";
        try {
            $totalProducts = count($productsList);
            $productsTotalSum = 0;
            $invoice = new Invoice('L','mm',array(250, 250));
            $invoice->setLang($lang);
            $invoice->AddPage();
            $invoice->invoiceMsg($name, $invoice_number);
            $invoice->setTableHeader();
            foreach ($productsList as $item) {
                $invoice->setTableBodyRow($item["name"], $item["price"], $item["quantity"], $item["subtotal"]);
                $productsTotalSum+=$item["subtotal"];
            }
            $invoice->setTotalSum($productsTotalSum);
            $invoice->outputFile($full_path);
            $this->mailer->isHTML(true);
            $this->mailer->setFrom($this->mailer->Username, "E-shopper");
            $this->mailer->addAddress($email);
            $this->mailer->Subject = "Invoice #{$invoice_number}";
            $this->mailer->Body = $this->langpack["invoices"]["details"];
            //add attachment
            $this->mailer->addAttachment("{$full_path}");
            $invoice_sent = $this->mailer->send();
            if ($invoice_sent) {
                unlink($full_path);
                return true;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}";
            die();
        }
    }
}