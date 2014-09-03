<!DOCTYPE html>
<html>
    <head>
        <title>Customize Individual Report</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="css/switch/style.css">
        <!--<script src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
        <style>
            #vID{
                text-align: center;
                font-size: 30px;
                position: relative;
            }
            #Attribute{
                position: relative;
                font-size: 20px;
                left:450px;
            }
            #swt{
                position: relative;
                top: -32px;
            }
            #combineL{
                position: relative;
                left: 90px;
            }
            #combineR{
                position: relative;
                left: 90px;
            }
            .imgBtn {
                color: white;
                font-size: 20px;
                position: relative;
                left: 520px;
                background-image: url(images/btn.png);
                background-position:  0px 0px;
                background-repeat: no-repeat;
                width: 300px;
                height: 75px;
                border: 0px;
                background-color: white;
                cursor: pointer;
                outline: 0;
            }
            .imgBtn:hover{ 
                font-size: 25px;
            }

            .imgBtn:active{
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <?php
        

        echo '<form method="post" action="Individual_Report.php" target="_blank">';
        
        include 'header.php';
        $volID = $_POST['volID'];
        session_start();
        $_SESSION['volID'] = $volID;
        echo '</br>';
        echo '<p id="vID">Volunteer ID : ' . $volID . '</p></br></br>
        </br></br>';
        
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
        $count = 0;
        foreach ($attrbt as $attr) {
            if($count%2 == 0){
                $pos = "combineL";
            }
            else{
                $pos = "combineR";
            }
            if($count == 0)
                $val = "0";
            echo '<div id="'.$pos.'">
                        <h1 id="Attribute">' . $attr . '</h1>
                            <div id ="swt" class="container">
                                <label class="switch">
                                  <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                  <span  class="switch-label" data-on="On" data-off="Off"></span>
                                  <span class="switch-handle"></span>
                                </label>
                            </div></div>';
            $count++;
        }



        echo '<input class="imgBtn" type="submit" name="submit" id="submit" value="View Report"/></form>';
        echo '</br></br>';
        include 'footer.php';
        ?>
        </br></br>

    </body>
</html>