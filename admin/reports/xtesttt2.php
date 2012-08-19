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
		$w = array(30,40,30,30,40);
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

			$this->Cell($w[0], 6, '24', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '10', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '2300.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'PAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '25', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '23', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '2900.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'PAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '33', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '5', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '555.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'PAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '40', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '11', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '770.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'NOTPAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '50', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '25', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '2300.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'PAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
			$this->Ln();
			$this->Cell($w[0], 6, '51', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '17', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '650.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'NOTPAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
			$this->Ln();
			
			$this->Cell($w[0], 6, '52', 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 5, '13', 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 4, '8990.00', 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 4, 'PAID', 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 5, '2011-07-30', 'LR', 0, 'R', $fill);
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
<h1>Daily Order Report</h1><br/>

EOD;

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);
//Column titles
$header = array('Order ID','Customer ID', 'Amount','Status', 'Order Date');

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
