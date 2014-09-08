<!Doctype HTML>
<html>
    <head>
        <title>Generate Reports</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="images/icon.png">
        <link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/Switch/style.css">
        <script src="jQuery/jQuery.js"></script>
        <script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>

        <style>
            #panel{
                margin-top: 30px;
                margin-left: 20px;
                margin-right: 20px;
            }
            #internal-panel{

            }
            #sub-panel{
                text-align: center;
                margin-left: 0px;
                margin-right:0px;
            }
            #panel-button{
                display: block;
                width: 100px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 20px;
            }
            #panel-title{
                text-align: center;

            }
            #panel-body{
                margin-right: 5px;
                margin-left: 5px;
            }
            #myModalLabel{
                text-align: center;
            }
            #swt{
                margin-left: auto;
            }
            #attribute{
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <div id="panel">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 id="panel-title" class="panel-title">Select Category</h3>
                </div>
                <div class="panel-body">
                    <div  id="panel-body" >
                        <div class="row">
                            <?php
                            $description = array("Individual",
                                "Overall",
                                "Monthly",
                                "By District",
                                "By Profession",
                                "By Gender"
                            );
                            $modal = array(
                                'Individual',
                                'Overall',
                                'Monthly',
                                'District',
                                'Profession',
                                'Gender'
                            );
                            $count = 0;
                            for ($i = 0; $i < 2; $i++) {
                                echo '<div class="col-md-6">';
                                for ($j = 0; $j < 3; $j++) {
                                    echo '<div class="col-md-4">
                                    <div  id="sub-panel">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                ' . $description[3 * $i + + $j] . '
                                            </div>
                                            <button id="panel-button" class="btn btn-primary" data-toggle="modal" data-target="#' . $modal[$count] . '">
                                                Go
                                            </button>
                                            
                                        </div>
                                    </div>
                                </div>';
                                    $count++;
                                }
                                echo '</div>';
                            }
                            ?>
                            <div class="modal fade" id="Individual" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2 class="modal-title" id="myModalLabel">Individual Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">
                                                <div class="form-group has-success has-feedback">
                                                    <input id="searchinput" class="form-control input-lg" type="text" placeholder="Volunteer ID" list="select" name="volID" autocomplete = "off"/>
                                                    <datalist id="select">

                                                    </datalist>
                                                </div>
                                                <?php
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
                                                foreach ($attrbt as $value) {
                                                    echo '<div class="row">
                                                <div id="attribute" class="col-md-6">
                                                    <h3>' . $value . '</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id ="swt" class="container">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                                            <span  class="switch-label" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $count++;
                                                }
                                                ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="Overall" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2 class="modal-title" id="myModalLabel">Overall Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">
                                                <?php
                                                $attrbt = array(
                                                    'Working Hours by District',
                                                    'Working Hours by Profession',
                                                    'Working Hours by Gender',
                                                    'Volunteer Value by District',
                                                    'Volunteer Value by Profession',
                                                    'Volunteer Value by Gender'
                                                );

                                                $count = 0;
                                                foreach ($attrbt as $value) {
                                                    echo '<div class="row">
                                                <div id="attribute" class="col-md-6">
                                                    <h3>' . $value . '</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id ="swt" class="container">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                                            <span  class="switch-label" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $count++;
                                                }
                                                ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="Monthly" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2 class="modal-title" id="myModalLabel">Monthly Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">
                                                <?php
                                                $attrbt = array(
                                                    'Working Hours by District',
                                                    'Working Hours by Profession',
                                                    'Working Hours by Gender',
                                                    'Volunteer Value by District',
                                                    'Volunteer Value by Profession',
                                                    'Volunteer Value by Gender'
                                                );

                                                $count = 0;
                                                foreach ($attrbt as $value) {
                                                    echo '<div class="row">
                                                <div id="attribute" class="col-md-6">
                                                    <h3>' . $value . '</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id ="swt" class="container">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                                            <span  class="switch-label" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $count++;
                                                }
                                                ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="District" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2 class="modal-title" id="myModalLabel">District Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">
                                                <?php
                                                $attrbt = array(
                                                    'Working Hours by Profession',
                                                    'Working Hours by Gender',
                                                    'Volunteer Value by Profession',
                                                    'Volunteer Value by Gender'
                                                );

                                                $count = 0;
                                                foreach ($attrbt as $value) {
                                                    echo '<div class="row">
                                                <div id="attribute" class="col-md-6">
                                                    <h3>' . $value . '</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id ="swt" class="container">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                                            <span  class="switch-label" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $count++;
                                                }
                                                ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="Profession" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2 class="modal-title" id="myModalLabel">Profession Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">
                                                <?php
                                                $attrbt = array(
                                                    'Working Hours by District',
                                                    'Working Hours by Gender',
                                                    'Volunteer Value by District',
                                                    'Volunteer Value by Gender'
                                                );

                                                $count = 0;
                                                foreach ($attrbt as $value) {
                                                    echo '<div class="row">
                                                <div id="attribute" class="col-md-6">
                                                    <h3>' . $value . '</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id ="swt" class="container">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                                            <span  class="switch-label" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $count++;
                                                }
                                                ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="Gender" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h2 class="modal-title" id="myModalLabel">Gender Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-inline" role="form" method="post" action="Individual_Report.php" target="_blank" onsubmit="return validate()">
                                                <?php
                                                $attrbt = array(
                                                    'Working Hours by District',
                                                    'Working Hours by Profession',
                                                    'Volunteer Value by District',
                                                    'Volunteer Value by Profession',
                                                );

                                                $count = 0;
                                                foreach ($attrbt as $value) {
                                                    echo '<div class="row">
                                                <div id="attribute" class="col-md-6">
                                                    <h3>' . $value . '</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id ="swt" class="container">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" name="check_list[]" value="' . $count . '" checked>
                                                            <span  class="switch-label" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>';
                                                    $count++;
                                                }
                                                ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
