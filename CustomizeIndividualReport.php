<!DOCTYPE html>
<html>
    <head>
        <title>Customize Individual Report</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="css/switch/style.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <style>
            #vID{
                font-size: 30px;
                position: relative;
                left: 20px;
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
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        $VolID = $_POST['volID'];
        echo '</br>';
        echo '<p id="vID">Volunteer ID : ' . $VolID . '</p>';
        ?>
        </br></br>

        <?php
        echo '<form method="post" action="test.php">';
        $attrbt = array(
            'ID No',
            'Personal Details',
            'Contact Details',
            'Education',
            'Employment',
            'Skills',
            'Profile',
            'Referees',
            'Profession',
            'Main Specialized Field',
            'Availability',
            'Volunteer Value',
            'No. of Opportunities',
            'Feedbacks'
        );
        $count = 0;
        foreach ($attrbt as $attr) {

            echo '<div id="combine">
                        <h1 id="Attribute">' . $attr . '</h1>
                            <div id ="swt" class="container">
                                <label class="switch">
                                  <input type="checkbox" class="switch-input" name="check_list[]" value="'.$count.'">
                                  <span  class="switch-label" data-on="On" data-off="Off"></span>
                                  <span class="switch-handle"></span>
                                </label>
                            </div></div>';
            $count++;
        }
        
        
        /*echo '<div class="about">
            <p class="about-links">
                <a href="#" target="_parent">View Article</a>
                <a href="index.php" target="_parent">Download</a>
            </p>
        </div>';*/
        
        echo '<input type="submit" name="submit" id="submit" value="Generate Report">          </input></form>';
        
        include 'footer.php';
        ?>
        </br></br>
        
    </body>
</html>