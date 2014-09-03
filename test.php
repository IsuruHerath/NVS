<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Test Page</title>
    </head>
    <body>
        <?php
        include 'DBConnector.php';
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
        $personalInfo;
        $contactInfo;
        $contactNumbers;
        $profile;
        $education;
        $employment;
        $skills;
        $availability;
        $feedbacks;
        $referees;
        
        $con = new DBConnector();
        if (isset($_POST['submit'])) {
            if (!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
                $checked_count = count($_POST['check_list']);
                echo "You have selected following " . $checked_count . " option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
                foreach ($_POST['check_list'] as $selected) {
                    echo "<p>" . $selected . "</p>";
                    switch ($selected){
                        case 0:
                            $query = "SELECT * from volunteer personal;";
                            $personalInfo = $con->getData($query);
                            break;
                        case 1:
                            $query = "SELECT * from volunteer contact details;";
                            $contactInfo = $con->getData($query);
                            $query = "SELECT * from volunteer contact numbers;";
                            $contactNumbers = $con->getData($query);
                            break;
                        case 2:
                            $query = "SELECT * from profile;";
                            $profile = $con->getData($query);
                            break;
                        case 3:
                            $query = "SELECT * from education;";
                            $education = $con->getData($query);
                            break;
                        case 4:
                            $query = "SELECT * from employment;";
                            $employment = $con->getData($query);
                            break;
                        case 5:
                            $query = "SELECT * from skills;";
                            $skills = $con->getData($query);
                            break;
                        case 6:
                            $query = "SELECT * from availability;";
                            $availability = $con->getData($query);
                            break;
                        case 7:
                            $query = "SELECT * from volunteer feedback;";
                            $feedbacks = $con->getData($query);
                            break;
                        case 8:
                            $query = "SELECT * from referees;";
                            $referees = $con->getData($query);
                            break;
                        
                    }
                }
            }
        }

//$ID = $_POST['option2'];
//echo $ID;
        ?>
        <div id="container">
            <input id="input" name="" type="" style="width: 115px;">
            <br>
            <select size="5" id="select" name="" style="width: 115px;">
                <option value="Value for Item 1" title="Title for Item 1">Item 1</option>
                <option value="Value for Item 2" title="Title for Item 2">Item 2</option>
                <option value="Value for Item 3" title="Title for Item 3">Item 3</option>
            </select>
        </div>
    </body>
    <script>
        var input = document.getElementById("input");
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
                //var result = ["mama","tuna","danushkaya","bathiya","pita ewun"];
                for(var i in result){
                    //add
                    var option = document.createElement("option");
                    option.text = result[i];
                    option.value = result[i];
                    option.onclick = function(){
                        input.value = this.value;
                    };
                    try {
                        select.add(option, null); //Standard
                    }catch(error) {
                        select.add(option); // IE only
                    }
                }
            };
            xhr.send("id="+text);
        };
    </script>
    
</html>