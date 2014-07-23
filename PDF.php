<?php
require('lib\diag\diag.php');
//require('phpgraphlib_v2.31\phpgraphlib.php');
class PDF extends PDF_Diag {
			 
	function Header() {
		//family, style, size
		if($this->PageNo()!=1){
			$this->SetTextColor(100,100,100);
			$this->SetFont('Times','',8);
			$this->SetY(0);
			//width, height, text, border, ln, align
			$this->Cell(0, 25, "National Volunteer Secretariat ", '0', 0, "L");
			$this->Cell(0, 25, $this->PageNo()-1, '0', 0, "R");
			//reset Y
			$this->SetY(1);
		}
	}
	
	function Cover($district) {
		$this->SetTextColor(000,100,231);
		$this->SetFont('Times','',22);
		$this->SetY(80);
		//$this->Cell(0, .25, "National Volunteer Secretariat,Sri Lanka", '0', 0, "C");
		$this->SetX(25.4);
		//$this->Cell(0, 2, "National Volunteer Secretariat,Sri Lanka", '0', 0, "C");
		$this->SetX(25.4);
		$this->Cell(0, 0, $district.' District Report', '0', 0, "C");
	}
	
	function Table($topics, $data)
	{
		$this->SetFont('Arial', 'B', 12);//Set the Font type to Arial,Bold with size 12 Pt
		$this->SetTextColor(0);//Set the Text Color
		$this->SetFillColor(000, 188, 225);//Fill the text with RGB Color
		$this->SetLineWidth(0.2);//Set the Line Width to 1pt

		$this->Cell(30, 7, $topics[0], 'LTR', 0, 'C', true);
		$this->Cell(30, 7, $topics[1], 'LTR', 0, 'C', true);
		$this->Cell(30, 7, $topics[2], 'LTR', 0, 'C', true);
		$this->Cell(50, 7, $topics[3], 'LTR', 1, 'C', true);
	
		$this->SetFont('Arial', '');
		$this->SetFillColor(238);
		$this->SetLineWidth(0.2);//0.2 pts
		$fill = false;
		while($row = mysqli_fetch_array($data)) {
			$this->Cell(30, 7, $row[$topics[0]], 1, 0, 'C', $fill);
			$this->Cell(30, 7, $row[$topics[1]], 1, 0, 'C', $fill);
			$this->Cell(30, 7, $row[$topics[2]], 1, 0, 'C', $fill);
			$this->Cell(50, 7, $row[$topics[3]], 1, 1, 'R', $fill);
			$fill = !$fill;
		}
	}
	
	function Graphs() {
	
	}
	
	function Footer() {
		//This is the footer; it's repeated on each page.
		//enter filename: phpjabber logo, x position: (page width/2)-half the picture size,
		//y position: rough estimate, width, height, filetype, link: click it!
			//$this->Image("logo.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.phpjabbers.com");
	}

}
?>