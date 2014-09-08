<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Reports</title>
        <!--<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>-->
        <link rel="stylesheet" href="css/style.css">
        <style>
            .reportType{
                position:relative;
                left: 10px;
                top:30px;
                font-family: Verdana, Geneva, sans-serif;
                font-size: 24px;
                color:#00C;
            }
            #submit{
                cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
                padding:5px 25px; /*add some padding to the inside of the button*/
                background:#0033FF; /*the colour of the button*/
                border:1px solid #33842a; /*required or the default border for the browser will appear*/
                position:relative;
                left:300px;
                top:55px;
                /*give the button curved corners, alter the size as required*/
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                border-radius: 10px;
                /*give the button a drop shadow*/
                -webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
                -moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
                box-shadow: 0 0 4px rgba(0,0,0, .75);
                /*style the text*/
                color:#f3f3f3;
                font-size:1.1em;
            }
            /***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
            #submit:hover, #submit:focus{
                background-color:#00C;/*make the background a little darker*/
                /*reduce the drop shadow size to give a pushed button effect*/
                -webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
                -moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
                box-shadow: 0 0 1px rgba(0,0,0, .75);
            }

        </style>
        <style>
            label { 
                padding:0.4em 2em 0.4em 0; 
            }
            .toggle-btn-grp { 
                margin:3px 0; 
            }
            .toggle-btn { 
                text-align:centre; 
                margin:5px 2px;
                padding:0.4em 3em; 
                color:#000; 
                background-color:#FFF; 
                border-radius:10px; 
                display:inline-block; 
                border:solid 1px #CCC; 
                cursor:pointer;
            }

            .toggle-btn-grp.joint-toggle .toggle-btn { 
                margin:5px 0; 
                padding:0.4em 2em; 
                border-radius:0;
                border-right-color:white;
            }
            .toggle-btn-grp.joint-toggle .toggle-btn:first-child { 
                margin-left:2px; 
                border-radius: 10px 0px 0px 10px; 
            }
            .toggle-btn-grp.joint-toggle .toggle-btn:last-child { 
                margin-right:2px;  
                border-radius: 0px 10px 10px 0px;
                border-right:solid 1px #CCC;
            }


            .toggle-btn:hover { 
                border:solid 1px #a0d5dc !important; 
                background:#f1fdfe;
            }


            .toggle-btn.success { 
                background:lightgreen;
                border:solid 1px green !important; 
            }
            .searchcontainer{
                position: absolute;
                top: 200px;
                left: 100px;
            }
            
        </style>
    </head>
    <?php
        include('header.php');
        ?>
    <body style="background: tan">

       
        <p class="reportType">Individual Report</p>
        <br/>
        <p>

            <?php
            echo '<form method="post" action="CustomizeIndividualReport.php" onsubmit="return validate()" autocomplete = "off">';
            echo '<div class="searchcontainer">
            <input type="text" list="select" name="volID" id="searchinput" />
                <datalist id="select">
                  
                </datalist>
                </div>
            ';

            echo '<input type="submit" name="submit" id="submit" value="Individual Report"/></form>';
            ?>
            </br></br></br></br>
        <p class="reportType">Customize Reports</p>
        <?php
        $districts = array(
            'Jaffna',
            'Kilinochchi',
            'Mannar',
            'Mulative',
            'Vavuniya',
            'Anuradhapura',
            'Polonnaruwa',
            'Colombo',
            'Kandy',
            'Matale',
            'Nuwara Eliya',
            'Ampara',
            'Batticalo',
            'Trincomalee',
            'Kurunegala',
            'Puththalam',
            'Kegalla',
            'Rathnapura',
            'Galle',
            'Hambantota',
            'Matara',
            'Badulla',
            'Monaragala',
            'Gampaha',
            'Kalutara'
        );
        sort($districts);

        echo '<form method="post" action="ByDistric_Report.php" >';
        echo '<section class = "container">';
        echo '<div class = "dropdown">';
        echo "<select name='district' class='dropdown-select'>";
        echo '<option ' . $default . ' value="">--Any District--</option>\n';
        foreach ($districts as $valued) {


            $default = '';
            echo '<option ' . $default . ' value="' . $valued . '">' . $valued . '</option>\n';
        }
        echo '</select>&nbsp;';
        echo '</div>';
        $proffessions = array(
            'Teacher',
            'Doctor',
            'Accountant'
        );
        sort($proffessions);
        echo '<div class = "dropdown">';
        echo "<select name='proffession' class='dropdown-select'>";
        echo '<option ' . $default . ' value="">--Any Proffession--</option>\n';
        foreach ($proffessions as $valued) {
            $default = '';
            echo '<option ' . $default . ' value="' . $valued . '">' . $valued . '</option>\n';
        }
        echo '</select>&nbsp;';
        echo '</div>';

        echo '<div class = "dropdown">';
        echo "<select name='proffession' class='dropdown-select'>";
        echo '<option ' . $default . ' value="">--Any Proffession--</option>\n';
        foreach ($proffessions as $valued) {
            $default = '';
            echo '<option ' . $default . ' value="' . $valued . '">' . $valued . '</option>\n';
        }
        echo '</select>&nbsp;';
        echo '</div>';

        echo '</section>';
        echo '<input type="submit" name="submit" id="submit" value="Generate Report">          </input></form>';
        echo '<br/><br/><br/>';
        include('footer.php');
        ?>
    </body>
    <script>
        var input = document.getElementById("searchinput");
        var select = document.getElementById("select");
        input.onkeypress = function(e){
            select.innerHTML = "";
            var t = "";
            if(e.key.length == 1){
                t = e.key; 
            }
            var text = input.value + t;
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
        };
    </script>
    <script>
        function validate(){
            for(var i in select.children) {
                if(input.value == select.children[i].value){
                    select.innerHTML = "";
                    return true;
                }
            }
            alert('Invalid Volunteer ID');
            input.value = "";
            input.focus();
            return false;
        }
    </script>
</html>