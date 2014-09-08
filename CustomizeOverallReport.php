<html>
    <head>
        <title>Customize Overall Report</title>
        <link rel="stylesheet" href="css/switch/style.css">
        <style>
            #vID{
                text-align: center;
                font-size: 30px;
                position: relative;
            }
            #Attribute{
                position: relative;
                font-size: 20px;
                left:350px;
            }
            #swt{
                position: relative;
                top: -35px;
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
                left: 465px;
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
            include 'header.php';
            echo '<br><br>';
            echo '<form method="post" action="Overall_Report.php" target="_blank">';
            $attrbt = array(
                'Working Hours by District',
                'Working Hours by Profession',
                'Volunteer Value by District',
                'Volunteer Value by Profession'
            );
            $count = 0;
            foreach ($attrbt as $attr) {
                if ($count % 2 == 0) {
                    $pos = "combineL";
                } else {
                    $pos = "combineR";
                }
                if ($count == 0)
                    $val = "0";
                echo '<div id="' . $pos . '">
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
    </body>
</html>