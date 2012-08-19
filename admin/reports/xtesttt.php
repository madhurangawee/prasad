<?php
//session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');

require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');


 $service = new Service;
 $data= $service->viewDailyCustomers();
 
 
 //print_r($data);
// extend TCPF with custom functions
class MYPDF extends TCPDF {

	// Load table data from file
	/*public function LoadData2($data) {
		
		return $data;
	}
*/

	// Colored table
	public function ColoredTable($header) {
		// Colors, line width and bold font
		$this->SetFillColor(70,130,180);
		$this->SetTextColor(255);
		$this->SetDrawColor(25,25,112);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		$w = array(30,40,30,50);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 6, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;
		
			$this->Cell($w[0], 6, '20', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '13', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '1500.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'SHOP', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '22', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '14', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '1300.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'SHOP', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '23', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '15', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '950.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'SHOP', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '24', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '16', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '2300.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'WEB', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '25', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '17', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '2900.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'WEB', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '30', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '18', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '320.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'SHOP', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '31', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '19', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '5500.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'SHOP', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '33', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '20', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '555.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'WEB', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '50', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '25', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '2300.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'WEB', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '51', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '26', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '6600.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'SHOP', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '52', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '27', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '8990.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 5, 'WEB', 'LR', 0, 'R', $fill);
			$this->Ln();
			$fill=!$fill;
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Prasad book Shop');
$pdf->SetTitle('Current Item Of the System');
$pdf->SetSubject('Current Item Of the System');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

$html = <<<EOD
<h1>Daily Sales Report</h1><br/>

EOD;

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);
//Column titles
$header = array('OrderID','BillID', 'Amount', 'Status');

//Data loading
//$data = $pdf->LoadData('../cache/table_data_demo.txt');

// print colored table
$pdf->ColoredTable($header, $data);

// set some text to print

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('CurrentItem.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
