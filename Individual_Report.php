<html>
    <head>
        <title>Individual_Report</title>
    </head>
    <boady>
        <?php
        require('pdf.php');
        require('DBConnector.php');

        //catch volunteer ID
        session_start();
        $volID = $_POST['volID'];

        //create a pdf
        $pdf = new PDF("P", "mm", "A4");

        $pdf->SetMargins(25.4, 25.4, 25.4);
        $pdf->AddPage();
        $pdf->SetTopMargin(25.4);

        $pdf->SetTextColor(000, 000, 000);
        $pdf->SetFont('Times', '', 12);
        $pdf->SetXY(25.4, 25);
        $pdf->MultiCell(0, 6, 'This Report is presented by the National Volunteering Secretariat Sri Lanka.', 0, 'J');
        $pdf->SetY($pdf->GetY() + 10);


        $attrbt = array(
            'Personal Details',
            'Contact Details',
            'Profile',
            'Education',
            'Employment',
            'Skills',
            'Availability',
            'Feedbacks',
            'Referees'
        );
        $personalInfo = NULL;
        $contactInfo = NULL;
        $contactNumbers = NULL;
        $profile = NULL;
        $education = NULL;
        $employment = NULL;
        $skills = NULL;
        $availability = NULL;
        $feedbacks = NULL;
        $referees = NULL;

        $con = new DBConnector();
        if (isset($_POST['submit'])) {
            if (!empty($_POST['check_list'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['check_list']);
                echo "You have selected following " . $checked_count . " option(s): <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach ($_POST['check_list'] as $selected) {
                    echo "<p>" . $selected . "</p>";
                    $pdf->SetTextColor(000, 000, 000);
                    $pdf->SetFont('Times', '', 16);
                    $pdf->SetY($pdf->GetY() + 10);

                    //print details according to the selected options
                    switch ($selected) {
                        case 0:
                            $query = "SELECT * from `volunteer personal` where ID = '" . $volID . "'";
                            $personalInfo = $con->getData($query);
                            if ($row = mysqli_fetch_array($personalInfo)) {


                                $pdf->Cell(0, 0, 'Personal Details', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);

                                $nickname = $row['preferred name'];
                                if ($nickname != NULL) {
                                    $pdf->Cell(0, 0, 'This person preferred to be called as "' . $nickname . '".', '0', '1', "L");
                                    $pdf->SetY($pdf->GetY() + 10);
                                }

                                $data = array('full name' => 'Name',
                                    'NIC-Passport' => 'NIC-Passport',
                                    'Gender' => 'Gender',
                                    'dateofbirth' => 'Date of Birth',
                                    'Nationality' => 'Nationality',
                                    'Civil Status' => 'Civil Status'
                                );
                                foreach (array_keys($data) as $key) {
                                    if ($row[$key] != NULL) {
                                        $pdf->Cell(30, 0, $data[$key], '0', '0', "L");
                                        $pdf->Cell(0, 0, ': ' . $row[$key], '0', '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    }
                                }
                            }

                            break;
                        case 1:
                            $query = "SELECT * from `volunteer contact details` where user = '" . $volID . "'";
                            $contactInfo = $con->getData($query);
                            $query = "SELECT * from `volunteer contact numbers` where user = '" . $volID . "'";
                            $contactNumbers = $con->getData($query);

                            $pdf->AddPage();
                            $pdf->SetY(25.4);
                            $pdf->Cell(0, 0, 'Contact Details', '0', '0', "C");
                            $pdf->SetY($pdf->GetY() + 10);

                            $pdf->SetTextColor(000, 000, 000);
                            $pdf->SetFont('Times', '', 12);
                            $mobCount = 0;
                            while ($row1 = mysqli_fetch_array($contactNumbers)) {
                                $mobCount++;
                                if ($mobCount == 1)
                                    $pdf->Cell(30, 0, 'Contact Number', '0', '0', "L");
                                else
                                    $pdf->Cell(30, 0, ' ', '0', '0', "L");
                                $pdf->Cell(20, 0, ': ' . $row1['number'], '0', '0', "L");
                                $pdf->Cell(0, 0, $row1['type'], '0', '0', "L");
                                $pdf->SetY($pdf->GetY() + 10);
                            }

                            if ($row = mysqli_fetch_array($contactInfo)) {

                                $data = array('email' => 'Email',
                                    'fax' => 'Fax',
                                    'Address' => '',
                                    'District' => 'District',
                                    'Country' => 'Country',
                                    'Province' => 'Province'
                                );

                                foreach (array_keys($data) as $key) {
                                    if ($key == 'Address') {
                                        $pdf->Cell(30, 0, 'Address', '0', '0', "L");
                                        $pdf->Cell(0, 0, ': ' . $row['Street Number'] . ', ' . $row['Street'] . ', ' . $row['City'], '0', '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    } else if ($row[$key] != NULL) {
                                        $pdf->Cell(30, 0, $data[$key], '0', '0', "L");
                                        $pdf->Cell(0, 0, ': ' . $row[$key], '0', '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    }
                                }
                            }

                            break;
                        case 2:
                            $query = "SELECT * from `profile` where user = '" . $volID . "'";
                            $profile = $con->getData($query);

                            if ($row = mysqli_fetch_array($profile)) {

                                $pdf->AddPage();
                                $pdf->SetY(25.4);
                                $pdf->Cell(0, 0, 'User Profile', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);


                                $data = array('intro' => 'Introduction',
                                    'reason' => 'Reason to Vol.',
                                    'Experience' => 'Experience',
                                    'Health' => 'Health',
                                    'driving license' => 'Driving License',
                                    'arrested' => 'Arrested',
                                    'aggregatedRating' => 'Aggregated Rating'
                                );

                                foreach (array_keys($data) as $key) {
                                    if ($row[$key] != NULL) {
                                        $pdf->Cell(35, 6, $data[$key], '0', '0', "L");
                                        $pdf->Cell(5, 6, ': ', '0', '0', "L");
                                        $pdf->MultiCell(0, 6, $row[$key], '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    }
                                }
                            }
                            break;
                        case 3:
                            $query = "SELECT * from `education` where user = '" . $volID . "'";
                            $education = $con->getData($query);

                            if ($row = mysqli_fetch_array($education)) {
                                $data = array('institution' => 'Institute',
                                    'field' => 'Field',
                                    'degree' => 'Degree',
                                    'duration' => 'Duration'
                                );


                                $pdf->AddPage();
                                $pdf->SetY(25.4);
                                $pdf->Cell(0, 0, 'Education Information', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);

                                foreach (array_keys($data) as $key) {
                                    if ($row[$key] != NULL) {
                                        $pdf->Cell(30, 0, $data[$key], '0', '0', "L");
                                        $pdf->Cell(0, 0, ': ' . $row[$key], '0', '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    }
                                }
                            }
                            break;
                        case 4:
                            $query = "SELECT * from `employment` where user = '" . $volID . "'";
                            $employment = $con->getData($query);

                            if ($row = mysqli_fetch_array($employment)) {
                                $data = array('occupation' => 'Occupation',
                                    'organization type' => 'Organization Type',
                                    'organization' => 'Organization'
                                );


                                $pdf->AddPage();
                                $pdf->SetY(25.4);
                                $pdf->Cell(0, 0, 'Employment Information', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);

                                foreach (array_keys($data) as $key) {
                                    if ($row[$key] != NULL) {
                                        $pdf->Cell(35, 0, $data[$key], '0', '0', "L");
                                        $pdf->Cell(0, 0, ': ' . $row[$key], '0', '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    }
                                }
                            }
                            break;
                        case 5:
                            $query = "SELECT * from `skills` where user = '" . $volID . "'";
                            $skills = $con->getData($query);

                            if ($row = mysqli_fetch_array($skills)) {
                                $data = array('skills' => 'Skills',
                                    'causes' => 'Causes',
                                    'other' => 'Other',
                                    'languages' => 'Languages'
                                );


                                $pdf->AddPage();
                                $pdf->SetY(25.4);
                                $pdf->Cell(0, 0, 'Skills', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);

                                foreach (array_keys($data) as $key) {
                                    if ($row[$key] != NULL) {
                                        $pdf->Cell(30, 6, $data[$key], '0', '0', "L");
                                        $pdf->Cell(5, 6, ': ', '0', '0', "L");
                                        $pdf->MultiCell(0, 6, $row[$key], '0', "L");
                                        $pdf->SetY($pdf->GetY() + 4);
                                    }
                                }
                            }
                            break;
                        case 6:
                            $query = "SELECT * from `availability` where user = '" . $volID . "'";
                            $availability = $con->getData($query);

                            if ($row = mysqli_fetch_array($availability)) {
                                $data = array('days' => 'Days',
                                    'duration' => 'During',
                                    'preferred time' => 'Preferred Time',
                                );


                                $pdf->AddPage();
                                $pdf->SetY(25.4);
                                $pdf->Cell(0, 0, 'Availability', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);

                                foreach (array_keys($data) as $key) {
                                    if ($row[$key] != NULL) {
                                        $pdf->Cell(30, 0, $data[$key], '0', '0', "L");
                                        $pdf->Cell(0, 0, ': ' . $row[$key], '0', '0', "L");
                                        $pdf->SetY($pdf->GetY() + 10);
                                    }
                                }
                            }
                            break;
                        case 7:
                            $query = "SELECT * from volunteer `feedback` where ID = '" . $volID . "'";
                            $feedbacks = $con->getData($query);
                            break;
                        case 8:
                            $query = "SELECT * FROM referees left outer join `referee and user` on referees.id = `referee and user`.referee where `referee and user`.user = '" . $volID . "'";
                            $referees = $con->getData($query);

                            if ($row = mysqli_fetch_array($referees)) {

                                $data = array('name',
                                    'address',
                                    'contact number',
                                    'email',
                                    'mobile number',
                                    'relationship'
                                );


                                $pdf->AddPage();
                                $pdf->SetY(25.4);
                                $pdf->Cell(0, 0, 'Referees', '0', '0', "C");
                                $pdf->SetY($pdf->GetY() + 10);

                                $pdf->SetTextColor(000, 000, 000);
                                $pdf->SetFont('Times', '', 12);

                                do {
                                    foreach (array_keys($data) as $key) {
                                        if ($row[$key] != NULL) {
                                            //$pdf->Cell(30, 0, $data[$key], '0', '0', "L");
                                            $pdf->Cell(0, 0, $row[$data[$key]], '0', '0', "L");
                                            $pdf->SetY($pdf->GetY() + 6);
                                        }
                                    }
                                    $pdf->SetY($pdf->GetY() + 10);
                                } while ($row = mysqli_fetch_array($referees));
                            }

                            break;
                    }
                }
            }
        }











        //orientation, units, size


        
          //$pdf->Cover($district);
          $pdf->AddPage();
          $pdf->SetY(25.4);
          //$pdf->Table($topics, $result);
     /*     //pie-chart
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
          $col1 = array(100, 100, 255);
          $col2 = array(255, 100, 100);
          $col3 = array(255, 255, 100);
          $pdf->PieChart(100, 35, $data, '%l (%p)', array($col1, $col2, $col3));
          $pdf->SetXY($valX, $valY + 40);
*/
          /* //bar chart
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
    </boady>
</html>