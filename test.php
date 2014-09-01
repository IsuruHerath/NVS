<html>
    <head>
        <title>Test Page</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            if (!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
                $checked_count = count($_POST['check_list']);
                echo "You have selected following " . $checked_count . " option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
                foreach ($_POST['check_list'] as $selected) {
                    echo "<p>" . $selected . "</p>";
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
        var input = Document.getElementById("input");
        input.onchange = function(){
            var text = input.value;
            var xhr = new XMLHttpRequest();
            xhr.open("post", "searchVolunteers.php");
        };
    </script>
</html>