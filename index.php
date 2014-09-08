<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Reports</title>
        <style>
            #Green{
                background-image: url(images/sq_1btn.png);
                position: absolute;
                left: 40px;
            }
            #Blue{
                background-image: url(images/sq_2btn.png);
                position: absolute;
                left: 370px;
            }
            #Violet{
                background-image: url(images/sq_3btn.png);
                position: absolute;
                left: 720px;
            }
            #Brown{
                background-image: url(images/sq_4btn.png);
                position: absolute;
                left: 1070px;
            }
            .imgBtn {
                color: white;
                font-size: 20px;
                top: 120px;
                background-position:  0px 0px;
                background-repeat: no-repeat;
                width: 250px;
                height: 250px;
                border: 0px;
                background-color: tan;
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

    <body style="background: tan">
        <?php
            include('header.php');
        ?>
        <input class="imgBtn" type="button" name="submit" id="Green" value="Individual Report" onClick="parent.location='CustomizeIndividualReport.php'"/>
        <input class="imgBtn" type="button" name="submit" id="Blue" value="Overall Report" onClick="parent.location='CustomizeOverallReport.php'"/>
        <input class="imgBtn" type="button" name="submit" id="Violet" value="By Profession Report" onClick="parent.location=''"/>
        <input class="imgBtn" type="button" name="submit" id="Brown" value="By District Report" onClick="parent.location=''"/>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
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