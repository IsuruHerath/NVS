<?php
			require('pdf.php');
			require('DBConnector.php');
			
			session_start();
			$volID = $_POST['volID'];
			
			$query = "SELECT * FROM Personal_Details where ID = '".$volID."'";
			$connector = new DBConnector();
			$result = $connector->getData($query);
			
			$name;
			$id;
			$contact;
			$district;
			$opportunitiesTaken;
			$feedbacks;
			
			//$result = mysqli_query($con,"SELECT * FROM Personal_Details where ID = '".$volID."'");
			$row = mysqli_fetch_array($result);
			$topics = array("year","month","date","income");
			
			
			//orientation, units, size
			$pdf=new PDF("P","mm","A4");
			
			$pdf->SetMargins(25.4,25.4,25.4);
			$pdf->AddPage();
			
			$pdf->SetTextColor(000,100,231);
			$pdf->SetFont('Times','',22);
			$pdf->SetXY(25.4,25);
			$pdf->Cell(0, 0, 'Individual Report for '.$volID, '0', 0, "C");
			$pdf->SetY($pdf->GetY() + 10);
			$pdf->SetTextColor(000,000,000);
			$pdf->SetFont('Times','',12);
			$pdf->Cell(0, 0, 'Name : '.$row['Full_Name'], '0', 0, "L");
			$pdf->SetY($pdf->GetY() + 10);
			$pdf->Cell(0, 0, 'ID_No : '.$row['ID'], '0', 0, "L");
			$pdf->SetY($pdf->GetY() + 10);
			$pdf->Cell(0, 0, 'District : '.$row['District'], '0', 0, "L");
			
			//$pdf->Cover($district);
			$pdf->AddPage();
			$pdf->SetY(25.4);
			//$pdf->Table($topics, $result);
			
			//pie-chart
			$pdf->SetFont('Arial', 'BIU', 12);
			$pdf->Cell(0, 5, '1 - Pie chart', 0, 1);
			$pdf->Ln(8);
			$data = array('Men' => 3000, 'Women' => 2000, 'Children' => 1000);
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