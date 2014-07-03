<!DOCTYPE html>
<html>
	<body>
		<?php
			
			//require('fpdf17\fpdf.php');
			require('PDF.php');
			/*class PDF extends FPDF {
			 
				function Header() {
					$this->SetFont('Times','',12);
					$this->SetY(0.25);
					//width, height, text, border, ln, align
					$this->Cell(0, .25, "National Volunteer Secretariat ", 'T', 0, "L");
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
			}*/
			// Create connection
			$con=mysqli_connect("localhost","root","","taxi");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			$result = mysqli_query($con,"SELECT * FROM order_details");
			mysqli_close($con);
			echo "done<br>";
			while($row = mysqli_fetch_array($result)) {
				echo $row['jobId']. " " .$row['customer_name'];
				echo "<br>";
			}
			//orientation, units, size
			$pdf=new PDF("P","in","A4");
 
			$pdf->SetMargins(1,1,1);
			 
			/*$pdf->AddPage();
			$pdf->SetFont('Times','',12);
			 
			$lipsum1="Lorem ipsum dolor sit amet, nam aliquam dolore est, est in eget.";
			  
			$lipsum2="Nibh lectus, pede fusce ullamcorper vel porttitor.";
			  
			$lipsum3 ="Duis maecenas et curabitur, felis dolor.";
			  
			$pdf->SetFillColor(240, 100, 100);
			$pdf->SetFont('Times','',12);
			  
			//Cell(float w[,float h[,string txt[,mixed border[,
			//int ln[,string align[,boolean fill[,mixed link]]]]]]])
			$pdf->Cell(0, .25, "lipsum", 1, 2, "C", 1);
			  
			$pdf->SetFont('Times','',12);
			//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
			$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
			$pdf->MultiCell(0, 0.25, $lipsum2, 1, "R");
			$pdf->MultiCell(0, 0.15, $lipsum3, 'B', "J");
			 
			$pdf->AddPage();
			$pdf->Write(0.5, $lipsum1.$lipsum2.$lipsum3);*/
			//ob_clean();
			ob_start();
			//ob_end_clean();
			$pdf->Output();
			ob_end_flush();
		?> 
	</body>
</html>