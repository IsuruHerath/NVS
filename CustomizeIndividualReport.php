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
            #searchinput,option{
                position: relative;
                top: 20px;
                left: 40px;
                background: white; 
                border: 1px solid #ffa853; 
                border-radius: 5px; 
                box-shadow: 0 0 5px 3px #ffa853; 
                color: #666; 
                outline: none; 
                height:23px; 
                width: 275px; 
            } 
        </style> 


    </head>
    <body>
        <?php
        include 'header.php';

        /* after submitting the form, the date will send to the Individual_Report.php */
        echo '<form method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">';



        //echo '<form method="post" action="CustomizeIndividualReport.php" onsubmit="return validate()" autocomplete = "off">';
        //textbox search for the matching IDs.
        echo '<div class="searchcontainer">
          <input type="text" list="select" name="volID" id="searchinput" autocomplete = "off"/>
          <datalist id="select">

          </datalist>
          </div>
          ';

        // $volID = $_POST['volID'];
        /* session_start();
          $_SESSION['searchinput'];
          echo '</br>';
          /*echo '<p id="vID">Volunteer ID : ' . $volID . '</p></br></br>
          </br></br>';
         */

        //user can select following options to have customized Reports 
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
                            </div>
                        </div>';
            $count++;
        }



        echo '<input class="imgBtn" type="submit" name="submit" id="submit" value="View Report"/></form>';
        echo '</br></br>';
        //include 'footer.php';
        ?>
        </br></br>

    </body>


    <script>
    
        //Script will add matching volunteer IDs.
    
        var input = document.getElementById("searchinput");
        var select = document.getElementById("select");
        input.onkeyup = function(key){
            console.log(key);
            if(key.keyCode != 38 && key.keyCode != 40) {
                select.innerHTML = "";
                var text = input.value;
                var xhr = new XMLHttpRequest();
                xhr.open("post", "searchVolunteers.php",false);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function(){
                    var result = JSON.parse(this.responseText);
                    //clear
                    for(var i in result){
                        //add
                        var option = document.createElement("option");
                        option.text = result[i];
                        option.value = result[i];
                        option.onclick = function(){
                            input.value = this.value;
                        };
                        try {
                            select.appendChild(option); //Standard
                        }catch(error) {
                            select.add(option); // IE only
                        }
                    }
                };
                xhr.send("id="+text);
            }
        };
    </script>
    <script>
        //validate user input before submit
        function validate(){
            for(var i in select.children) {
                if(input.value == select.children[i].value){
                    select.innerHTML = "";
                    return true;
                }
            }
            try{
                alert('Invalid Volunteer ID');
            }
            catch(Error){
            
            }
            input.value = "";
            input.focus();
            return false;
        }
    </script>
</html>