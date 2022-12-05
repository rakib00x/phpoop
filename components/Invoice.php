<?php
class Invoice extends tFPDF{
	private $lang;
	private $langpack=array(
		'fields'=>array(
				'ge'=>array
			(
				"id"=>"პ/ნ",
				"invoice"=>"ინვოისი", 
				"bank_account"=>"ბანკის ანგარიში",
				"company"=>"კომპანია",
				"address"=>"მისამართი",
				"price"=>"ფასი",
				"product"=>"პროდუქტი",
				"quantity"=>"რაოდენობა",
				"sum"=>"ჯამი (ლარი)"
			), 

			'en'=>array
			(
				"id"=>"ID",
				"invoice"=>"Invoice",
				"bank_account"=>"Bank account",
				"company"=>"Company",
				"address"=>"Address",
				"price"=>"Price",
				"product"=>"Product",
				"quantity"=>"Quantity",
				"sum"=>"Sum (GEL)"
			)
		),

		'values'=>array(
				'ge'=>array
			(
				"id"=>"00000000000",
				"bank_account"=>"GE00000000000000000000",
				"company"=>'შპს "E-shopper"',
				"address"=>"თბილისი, დ.აღმაშენებლის #1",
			), 

			'en'=>array
			(
				"id"=>"00000000000",
				"bank_account"=>"GE00000000000000000000",
				"company"=>'E-Shopper Inc.',
				"address"=>"Tbilisi, D.Aghmashenebeli #1",
			)
		),

		'msg'=>array(
			'ge'=>array
			(
				"msg_1"=>"ძვირფასო", 
				"msg_2"=>"თქვენ უნდა გადმორიცხოთ საერთო ჯამის მთლიანი თანხა ჩვენს საბანკო",
				"msg_3"=>"ანგარიშზე არაუგვიანეს 2 სამუშაო დღისა, წინააღმდეგ შემთხვევაში თქვენი შეკვეთა გაუქმდება.",
				"msg_4"=>"საბანკო გადმორიცხვისას, დანიშნულებაში გთხოვთ მიუთითოთ ინვოისი #.",
				"msg_5"=>"გადახდის შემდგომ სერვისის გაწევა მოხდება",
				"msg_6"=>"სამუშაო დღეში."
			), 

			'en'=>array
			(
				"msg_1"=>"Dear", 
				"msg_2"=>"you must transfer total sum on our bank account not later ",
				"msg_3"=>"than in 2 working days, otherwise your purchase will be cancelled.",
				"msg_4"=>"When making a bank transfer, please specify invoice # in the purpose of payment.",
				"msg_5"=>"After payment the service will be provided within",
				"msg_6"=>"working day."
			),
		),
		"total"=>array(
			"en"=>"Total Sum",
			"ge"=>"საერთო ჯამი"
		)
		
	);
	public function setLang($lang){
		$this->lang = $lang;
	}
	public function Header(){
	    $this->Image(ROOT.'/template/images/logo.png',5,5,50, "L");
	    $this->AddFont('DejaVu','','DejaVuSerif.ttf',true);
		$this->SetFont('DejaVu','U',14);
	    $this->Cell(50);
	    $this->SetFont('DejaVu','',12);
	    $this->Cell(175, 10, date("d/m/Y, H:i", time()), 0, 0,'R');
	    $this->Ln(15);
	   	$this->SetFont('DejaVu','',12);
	    $this->Cell(0,10, $this->langpack['fields'][$this->lang]["id"].": ".$this->langpack['values'][$this->lang]["id"],0,0,'L');
	    $this->Ln(7);
	    $this->Cell(0,10, $this->langpack['fields'][$this->lang]["bank_account"].': '.$this->langpack['values'][$this->lang]["bank_account"], 0, 0,'L');
	    $this->Ln(7);
	    $this->Cell(0,10, $this->langpack['fields'][$this->lang]["company"].': '.$this->langpack['values'][$this->lang]["company"], 0, 0,'L');
	    $this->Ln(7);
	    $this->Cell(0,10, $this->langpack['fields'][$this->lang]["address"].': '.$this->langpack['values'][$this->lang]["address"],0,0,'L');
	    $this->Ln(7);
	    $this->SetFont('DejaVu','U',12);
	    $this->Cell(0,10,'www.eshopper.test',0,0,'L');
	    $this->Ln(15);
	}


	public function invoiceMsg($customer_name, $invoice_number, $number_of_days=3){
		$this->Ln(10);
		$this->Cell(200,10, $this->langpack['fields'][$this->lang]['invoice']." #".$invoice_number, 0,0,'C');
		$this->Ln(10);
		$this->SetFont('DejaVu','',12);
	    $this->Cell(5);
	    $this->Cell(150,10, $this->langpack['msg'][$this->lang]["msg_1"]." ".$customer_name.", ".$this->langpack['msg'][$this->lang]["msg_2"], 0,0,'L');
	    $this->Ln(5);
	    $this->Cell(5);
	    $this->Cell(150,10, $this->langpack['msg'][$this->lang]["msg_3"] ,0,0,'L');
	    $this->Ln(5);
	    $this->Cell(5);
	    $this->SetFont('DejaVu','U',12);
	    $this->Cell(150,10, $this->langpack['msg'][$this->lang]["msg_4"],0,0,'L');
	    $this->Ln(5);
	    $this->Cell(5);
	    $this->SetFont('DejaVu','',12);
	    $this->Cell(150,10, $this->langpack['msg'][$this->lang]["msg_5"]." ".$number_of_days." ".$this->langpack['msg'][$this->lang]["msg_6"],0,0,'L');
	    $this->Ln(20);
	}

	public function setTotalSum($totalSum){
		$this->Ln(20);
		$this->SetFont('DejaVu','',12);
		$this->Cell(230,10, "{$this->langpack['total'][$this->lang]}: {$totalSum} GEL", 0, 0,'R');
	}

	public function setTableHeader(){
		$this->SetFont('DejaVu','',12); 
		$this->SetFillColor(254, 152, 15);
	    $this->Cell(55,10, $this->langpack['fields'][$this->lang]["product"], 1, 0,'C', TRUE);
	    $this->Cell(55,10, $this->langpack['fields'][$this->lang]["price"], 1, 0,'C', TRUE);
	    $this->Cell(55,10, $this->langpack['fields'][$this->lang]["quantity"], 1, 0,'C', TRUE);
	    $this->Cell(55,10, $this->langpack['fields'][$this->lang]["sum"], 1, 0,'C', TRUE);
	}

	public function setTableBodyRow($product_name, $product_price, $quantity, $sum){
		$this->Ln(10);
		$this->Cell(55,10, mb_strimwidth($product_name, 0, 20, "..."), 1, 0,'L');
		$this->SetFont('Arial','',12); 
		$this->Cell(55,10, $product_price, 1, 0,'C');
	    $this->Cell(55,10, $quantity, 1, 0,'C');
	    $this->Cell(55,10, $sum,1, 0,'C');
	}

	public function outputFile($full_path){
		$this->Output('F', $full_path, true);
	}
}
?>