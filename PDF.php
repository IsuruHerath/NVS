<?php
require('fpdf17\fpdf.php');
class PDF extends FPDF {
			 
	function Header() {
		//family, style, size
		$this->SetTextColor(100,100,100);
		$this->SetFont('Times','',8);
		$this->SetY(0.25);
		//width, height, text, border, ln, align
		$this->Cell(0, .25, "National Volunteer Secretariat ", '0', 0, "L");
		$this->Cell(0, .25, $this->PageNo(), '0', 0, "R");
		//reset Y
		$this->SetY(1);
	}
	
	function Footer() {
		//This is the footer; it's repeated on each page.
		//enter filename: phpjabber logo, x position: (page width/2)-half the picture size,
		//y position: rough estimate, width, height, filetype, link: click it!
			//$this->Image("logo.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.phpjabbers.com");
	}
}
?>