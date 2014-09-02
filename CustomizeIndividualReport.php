<!DOCTYPE html>
<html>
    <head>
        <title>Customize Individual Report</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="css/switch/style.css">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <style>
            #vID{
                text-align: center;
                font-size: 30px;
                position: relative;
            }
            #Attribute{
                position: relative;
                font-size: 20px;
                left:400px;
            }
            #swt{
                position: relative;
                top: -32px;
            }
            #combine{
                position: relative;
                left: 120px;
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
                background-color: none;
                cursor: pointer;
                outline: 0;
            }
            .imgBtn:hover{ 
                font-size: 25px;
            }

            .imgBtn:active{
            }
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        $VolID = $_POST['volID'];
        echo '</br>';
        echo '<p id="vID">Volunteer ID : ' . $VolID . '</p></br></br>';
        ?>
        </br></br>

        <?php
        echo '<form method="post" action="test.php">';
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

            echo '<div id="combine">
                        <h1 id="Attribute">' . $attr . '</h1>
                            <div id ="swt" class="container">
                                <label class="switch">
                                  <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '">
                                  <span  class="switch-label" data-on="On" data-off="Off"></span>
                                  <span class="switch-handle"></span>
                                </label>
                            </div></div>';
            $count++;
        }



        echo '<input class="imgBtn" type="submit" name="submit" id="submit" value="Generate Report">          </input></form>';
        echo '</br></br>';
        include 'footer.php';
        ?>
        </br></br>

    </body>
</html>