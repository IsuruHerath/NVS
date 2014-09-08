<?php
    
    //Retriew data from database and Calculate working hours, volunteer value, no. of opportunities taken

    if (isset($_POST['submit'])) {
        if (!empty($_POST['check_list'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['check_list']);
            echo "You have selected following " . $checked_count . " option(s): <br/>";
            // Loop to store and display values of individual checked checkbox.
            foreach ($_POST['check_list'] as $selected) {
                echo "<p>" . $selected . "</p>";
                /*$pdf->SetTextColor(000, 000, 000);
                $pdf->SetFont('Times', '', 16);
                $pdf->SetY($pdf->GetY() + 10);*/
                switch ($selected) {
                    
                    //write graphs for each option
                    
                }
            }
        }
    }

?>
