<?php
			require('pdf.php');
			
			session_start();
			$volID = $_POST['volID'];
			$con=mysqli_connect("localhost","root","","taxi");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			$result = mysqli_query($con,"SELECT * FROM daily_income");
			$topics = array("year","month","date","income");
			mysqli_close($con);
			echo "done<br>";
			
			//orientation, units, size
			$pdf=new PDF("P","mm","A4");
			//$pdf = new PDF_Diag();
			$pdf->SetMargins(25.4,25.4,25.4);
			$pdf->AddPage();
			
			$pdf->SetTextColor(000,100,231);
			$pdf->SetFont('Times','',22);
			$pdf->SetXY(25.4,25);
			$pdf->Cell(0, 0, 'Individual Report for '.$volID, '0', 0, "C");
			$pdf->SetY($pdf->GetY() + 10);
			
			//$pdf->Cover($district);
			$pdf->AddPage();
			$pdf->SetY(25.4);
			$pdf->Table($topics, $result);
			
			//pie-chart
			$pdf->SetFont('Arial', 'BIU', 12);
			$pdf->Cell(0, 5, '1 - Pie chart', 0, 1);
			$pdf->Ln(8);
			$data = array('Men' => 1510, 'Women' => 1610, 'Children' => 1400);
			$pdf->SetFont('Arial', '', 10);
			$valX = $pdf->GetX();
			$valY = $pdf->GetY();
			$pdf->Cell(30, 5, 'Number of men:');
			$pdf->Cell(15, 5, $data['Men'], 0, 0, 'R');
			$pdf->Ln();
			$pdf->Cell(30, 5, 'Number of women:');
			$pdf->Cell(15, 5, $data['Women'], 0, 0, 'R');
			$pdf->Ln();
			$pdf->Cell(30, 5, 'Number of children:');
			$pdf->Cell(15, 5, $data['Children'], 0, 0, 'R');
			$pdf->Ln();
			$pdf->Ln(8);

			$pdf->SetXY(90, $valY);
			$col1=array(100, 100, 255);
			$col2=array(255, 100, 100);
			$col3=array(255, 255, 100);
			$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1, $col2, $col3));
			$pdf->SetXY($valX, $valY + 40);
			
			/*//bar chart
			$pdf->SetFont('Arial', 'BIU', 12);
			$pdf->Cell(0, 5, '2 - Bar diagram', 0, 1);
			$pdf->Ln(8);
			$valX = $pdf->GetX();
			$valY = $pdf->GetY();
			$pdf->BarDiagram(200, 30, $data, '%l : %v (%p)', array(255, 175, 100));
			$pdf->SetXY($valX, $valY + 80);
			
			*/
			
			//ob_end_clean();
			ob_start();
			//ob_end_clean();
			$pdf->Output();
			ob_end_flush();
		?> 